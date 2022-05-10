<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\AppBaseController;
use App\Mail\ClientMakePaymentMail;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;

class PaypalController extends AppBaseController
{
    public function onBoard(Request $request)
    {

        try {
            $invoiceId = $request->get('invoiceId');
            $payable_amount = $request->get('amount');


            $clientId = getPaypalClientId();
            $clientSecret = getPaypalSecret();

            $mode = config('payments.paypal.mode');

            if ($mode == 'live') {
                $environment = new ProductionEnvironment($clientId, $clientSecret);
            } else {
                $environment = new SandboxEnvironment($clientId, $clientSecret);
            }

            $client = new PayPalHttpClient($environment);

            $request = new OrdersCreateRequest();

            $request->prefer('return=representation');
            $request->body = [
                "intent"              => "CAPTURE",
                "purchase_units"      => [
                    [
                        "reference_id" => $invoiceId,
                        "amount"       => [
                            "value"         => $payable_amount,
                            "currency_code" => getCurrencyCode(),
                        ],
                    ],
                ],
                "application_context" => [
                    "cancel_url" => route('paypal.failed'),
                    "return_url" => route('paypal.success'),
                ],
            ];

            $order = $client->execute($request);

            return response()->json($order);
        } catch (\Exception $exception) {
            $error = json_decode($exception->getMessage(), true);
            if ($error['details'][0]['issue'] == 'CURRENCY_NOT_SUPPORTED') {
                return $this->sendError(getCurrencyCode().' is not currently supported.');
            }
        }
    }

    public function failed()
    {
        Flash::error('Your Payment is Cancelled');

        return redirect()->route('client.invoices.index');
    }

    public function success(Request $request)
    {
        $clientId = getPaypalClientId();
        $clientSecret = getPaypalSecret();
        $mode = config('payments.paypal.mode');

        if ($mode == 'live') {
            $environment = new ProductionEnvironment($clientId, $clientSecret);
        } else {
            $environment = new SandboxEnvironment($clientId, $clientSecret);
        }
        $client = new PayPalHttpClient($environment);

        // Here, OrdersCaptureRequest() creates a POST request to /v2/checkout/orders
// $response->result->id gives the orderId of the order created above
        $request = new OrdersCaptureRequest($request->get('token'));
        $request->prefer('return=representation');
        try {
            // Call API with your client and get a response for your call
            $response = $client->execute($request);
            // If call returns body in response, you can get the deserialized version from the result attribute of the response
            $invoiceId = $response->result->purchase_units[0]->reference_id;
            $amount = $response->result->purchase_units[0]->amount->value;

            $transactionId = $response->result->id;
            /** @var Invoice $invoice */
            $invoice = Invoice::with(['client.user', 'payments'])->findOrFail($invoiceId);
            $input['user_id'] = User::role(Role::ROLE_ADMIN)->where('tenant_id',$invoice->client->tenant_id)->first()->id;
            $clientUser = $invoice->client->user;
            $transactionDetails = [
                'transaction_id' => $transactionId,
                'amount' => $amount,
                'status' => 'paid',
                'payment_mode' => Transaction::TYPE_PAYPAL,
                'meta' => json_encode($response),
                'tenant_id' => $invoice->tenant_id,
                'user_id' => $clientUser->id,
            ];
            $transaction = Transaction::create($transactionDetails);

            if ($invoice->status == Payment::PARTIALLYPAYMENT) {
                $totalAmount = ($invoice->final_amount - $invoice->payments->sum('amount'));
            } else {
                $totalAmount = $invoice->final_amount;
            }

            $paymentData = [
                'invoice_id' => $invoiceId,
                'amount' => $amount,
                'payment_mode' => Payment::PAYPAL,
                'payment_date' => Carbon::now(),
                'transaction_id' => $transaction->id,
                'tenant_id' => $invoice->tenant_id,
                'user_id' => $clientUser->id,
            ];

            $invoicePayment = Payment::create($paymentData);

            $invoiceData = [];
            $invoiceData['amount'] = $invoicePayment['amount'];
            $invoiceData['payment_date'] = $invoicePayment['payment_date'];
            $invoiceData['invoice_id'] = $invoicePayment['invoice_id'];
            $invoiceData['invoice'] = $invoicePayment->invoice;
            $invoiceData['first_name'] = $clientUser->first_name;
            $invoiceData['last_name'] = $clientUser->last_name;
            if (getSettingValue('mail_notification')) {
                Mail::to(getAdminUser()->email)->send(new ClientMakePaymentMail($invoiceData));
            }
            if (round($totalAmount, 2) == $amount) {
                $invoice->status = Payment::FULLPAYMENT;
                $invoice->save();
            } else {
                if (round($totalAmount, 2) != $amount) {
                    $invoice->status = Payment::PARTIALLYPAYMENT;
                    $invoice->save();
                }
            }
            Flash::success('Payment successfully done.');
            
            $userId= User::role(Role::ROLE_ADMIN)->where('tenant_id',$invoice->client->tenant_id)->first()->id;
            $title = "Payment ".getCurrencySymbol().$amount." received successfully for #".$invoice->invoice_id.".";
            addNotification([
                Notification::NOTIFICATION_TYPE['Invoice Payment'],
                $userId,
                $title,
            ]);

            return redirect(route('client.invoices.index'));


        } catch (HttpException $ex) {
            echo $ex->statusCode;
            print_r($ex->getMessage());
        }
    }
}
