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
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Laracasts\Flash\Flash;
use Razorpay\Api\Api;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class RazorpayController extends AppBaseController
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function onBoard(Request $request): JsonResponse
    {
        $user = Auth::user();
        $invoiceID = Invoice::whereId($request->invoice_id)->firstOrFail()->invoice_id;
        $api = new Api(getRazorpayKey(), getRazorpaySecret());
        $orderData = [
            'receipt'  => 1,
            'amount'   => $request->amount * 100, // 100 = 1 rupees
            'currency' => getCurrencyCode(),
            'notes'    => [
                'email'     => $user->email,
                'name'      => $user->full_name,
                'invoiceID' => $request->invoice_id,
            ],
        ];
        $razorpayOrder = $api->order->create($orderData);

        $data['id'] = $razorpayOrder->id;
        $data['amount'] = $request->amount;
        $data['name'] = $user->full_name;
        $data['email'] = $user->email;
        $data['invoiceId'] = $request->invoice_id;
        $data['invoice_id'] = $invoiceID;

        return $this->sendResponse($data, 'Payment create successfully');
    }

    /**
     * @param Request $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function paymentSuccess(Request $request)
    {
        $input = $request->all();
        Log::info('RazorPay Payment Successfully');
        Log::info($input);
        $api = new Api(getRazorpayKey(), getRazorpaySecret());
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                $generatedSignature = hash_hmac('sha256', $payment['order_id']."|".$input['razorpay_payment_id'],
                    getRazorpaySecret());
                if ($generatedSignature != $input['razorpay_signature']) {

                    return redirect()->back();
                }
                DB::beginTransaction();
                // Create Transaction Here
                $invoiceId = $payment['notes']['invoiceID'];
                $paymentAmount = $payment['amount'] / 100;
                /** @var Invoice $invoice */
                $invoice = Invoice::with(['client.user', 'payments'])->findOrFail($invoiceId);
                $clientUser = $invoice->client->user;
                
                if ($invoice->status == Payment::PARTIALLYPAYMENT) {
                    $totalAmount = ($invoice->final_amount - $invoice->payments->sum('amount'));
                } else {
                    $totalAmount = $invoice->final_amount;
                }

                if (round($totalAmount, 2) == $paymentAmount) {
                    $invoice->status = Payment::FULLPAYMENT;
                    $invoice->save();
                } elseif (round($totalAmount, 2) != $paymentAmount) {
                    $invoice->status = Payment::PARTIALLYPAYMENT;
                    $invoice->save();
                }
                $transaction = [
                    'transaction_id' => $payment->id,
                    'amount' => $paymentAmount,
                    'status' => 'paid',
                    'payment_mode' => Transaction::TYPE_RAZORPAY,
                    'meta' => $payment->toArray(),
                    'tenant_id' => $invoice->tenant_id,
                    'user_id' => $clientUser->id,
                ];
                $transaction = Transaction::create($transaction);

                $paymentData = [
                    'invoice_id' => $invoiceId,
                    'amount' => $payment['amount'] / 100,
                    'payment_mode' => Payment::RAZORPAY,
                    'payment_date' => Carbon::now(),
                    'transaction_id' => $transaction->id,
                    'tenant_id' => $invoice->tenant_id,
                    'user_id' => $clientUser->id,
                ];
                $payment = Payment::create($paymentData);

                //notification
                $title = "Payment ".getCurrencySymbol().$paymentAmount." received successfully for #".$invoice->invoice_id.".";
                
                $userId = User::role(Role::ROLE_ADMIN)->where('tenant_id',$invoice->client->tenant_id)->first()->id;

                addNotification([
                    Notification::NOTIFICATION_TYPE['Invoice Payment'],
                    $userId,
                    $title,
                ]);

                $invoiceData = [];
                $invoiceData['amount'] = $payment->amount;
                $invoiceData['payment_date'] = $payment->payment_date;
                $invoiceData['invoice_id'] = $invoice->id;
                $invoiceData['invoice'] = $invoice;
                $invoiceData['first_name'] = $clientUser->first_name;
                $invoiceData['last_name'] = $clientUser->last_name;

                if (getSettingValue('mail_notification')) {
                    Mail::to($clientUser->email)->send(new ClientMakePaymentMail($invoiceData));
                }
                Flash::success('Payment successfully done.');

                DB::commit();

                return redirect(route('client.invoices.index'));

            } catch (Exception $e) {
                DB::rollBack();
                throw new UnprocessableEntityHttpException($e->getMessage());
            }
        }

        return redirect()->back();
    }

    /**
     * @param Request $request
     *
     * @return Application|RedirectResponse|Redirector
     */
    public function paymentFailed(Request $request)
    {

        $data = $request->get('data');
        Log::info('payment failed');
        Log::info($data);

        Flash::error('Your Payment is Cancelled.');

        return redirect(route('client.invoices.index'));
    }

    /**
     * @param Request $request
     *
     * @return false
     */
    public function paymentSuccessWebHook(Request $request)
    {
        $input = $request->all();
        Log::info('webHook Razorpay');
        Log::info($input);
        if (isset($input['event']) && $input['event'] == 'payment.captured' && isset($input['payload']['payment']['entity'])) {
            $payment = $input['payload']['payment']['entity'];
        }

        return false;
    }

}
