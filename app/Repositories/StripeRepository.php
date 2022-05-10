<?php

namespace App\Repositories;

use App\Mail\ClientMakePaymentMail;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Payment;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * Class StripeRepository
 */
class StripeRepository
{

    public function clientPaymentSuccess($sessionId): void
    {
        setStripeApiKey();
        $sessionData = \Stripe\Checkout\Session::retrieve($sessionId);

        $stripeID = $sessionData->id;
        $paymentStatus = $sessionData->payment_status;
        $amount = (getCurrencyCode() != 'JPY') ? $sessionData->amount_total / 100 : $sessionData->amount_total;
        $invoiceId = $sessionData->client_reference_id;

        /** @var Invoice $invoice */
        $invoice = Invoice::with(['client.user', 'payments'])->findOrFail($invoiceId);
        $clientUser = $invoice->client->user;

        $transactionData = [
            'tenant_id' => $invoice->tenant_id,
            'user_id' => $clientUser->id,
            'transaction_id' => $stripeID,
            'payment_mode' => Transaction::TYPE_STRIPE,
            'amount' => $amount,
            'status' => $paymentStatus,
            'meta' => $sessionData->toArray(),
        ];

        try {
            DB::beginTransaction();
            if ($invoice->status == Payment::PARTIALLYPAYMENT) {
                $totalAmount = ($invoice->final_amount - $invoice->payments->sum('amount'));
            } else {
                $totalAmount = $invoice->final_amount;
            }

            $transaction = Transaction::create($transactionData);
            $paymentData = [
                'invoice_id' => $invoiceId,
                'amount' => $amount,
                'payment_mode' => Payment::STRIPE,
                'payment_date' => Carbon::now(),
                'transaction_id' => $transaction->id,
                'tenant_id' => $invoice->tenant_id,
                'user_id' => $clientUser->id,
            ];

            // update invoice bill

            $invoicePayment = Payment::create($paymentData);

            if (round($totalAmount, 2) == $amount) {
                $invoice->status = Payment::FULLPAYMENT;
                $invoice->save();
            } else {
                if (round($totalAmount, 2) != $amount) {
                    $invoice->status = Payment::PARTIALLYPAYMENT;
                    $invoice->save();
                }
            }
            $paymentData['userId'] = User::role(Role::ROLE_ADMIN)->where('tenant_id',$invoice->client->tenant_id)->first()->id;
            $this->saveNotification($paymentData);
            $invoiceData = [];
            $invoiceData['amount'] = $paymentData['amount'];
            $invoiceData['payment_date'] = $paymentData['payment_date'];
            $invoiceData['invoice_id'] = $invoice->id;
            $invoiceData['invoice'] = $invoice;
            $invoiceData['first_name'] = $clientUser->first_name;
            $invoiceData['last_name'] = $clientUser->last_name;

            if (getSettingValue('mail_notification')) {
                Mail::to($clientUser->email)->send(new ClientMakePaymentMail($invoiceData));
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    /**
     * @param $input
     *
     */
    public function saveNotification($input)
    {
        $userId = $input['userId'];
        
        $invoice = Invoice::find($input['invoice_id']);
        $title = "Payment ".getCurrencySymbol().$input['amount']." received successfully for #".$invoice->invoice_id.".";
        addNotification([
            Notification::NOTIFICATION_TYPE['Invoice Payment'],
            $userId,
            $title,
        ]);
    }
}
