<?php

namespace App\Repositories;

use App\Mail\ClientMakePaymentMail;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;

/**
 * Class PaymentRepository
 */
class PaymentRepository extends BaseRepository
{

    public function getFieldsSearchable(): array
    {
        return [];
    }

    /**
     *
     * @return string
     */
    public function model(): string
    {
        return Payment::class;
    }

    /**
     * @param $input
     *
     * @return mixed
     */
    public function store($input)
    {
        if ($input['payable_amount'] == $input['amount']) {
            $input['payment_type'] = Payment::FULLPAYMENT;
        }
        /** @var Invoice $invoiceData */
        $invoiceData = Invoice::with(['client.user', 'payments'])->whereId($input['invoice_id'])->firstOrFail();
        $input['tenant_id'] = $invoiceData->tenant_id;
        $input['user_id'] = $invoiceData->client->user_id;
        $payment = Payment::create($input);
        $invoice = Invoice::whereId($input['invoice_id'])->update(['status' => $input['payment_type']]);
        $user = $invoiceData->client->user;
        $input['first_name'] = $user->first_name;
        $input['last_name'] = $user->last_name;

        $input['invoice'] = $payment->invoice;

        if (getSettingValue('mail_notification')) {
            Mail::to($user->email)->send(new ClientMakePaymentMail($input));
        }

        return $payment;
    }

    /**
     * @param $invoice
     *
     * @return array
     */
    public function getTotalPayable($invoice): array
    {
        $data = [];
        $invoice->load(['payments']);
        $data['id'] = $invoice->id;
        $payment = $invoice->payments()->get();

        if ($invoice->status == Payment::PARTIALLYPAYMENT) {
            $data['total_amount'] = ($invoice->final_amount - $payment->sum('amount'));
        } else {
            $data['total_amount'] = $invoice->final_amount;
        }

        return $data;
    }

    /**
     * @param $input
     *
     */
    public function saveNotification($input)
    {
        $userId = $input['user_id'];
        $invoice = Invoice::find($input['invoice_id']);
        $title = "Payment ".getCurrencySymbol().$input['amount']." received successfully for #".$invoice->invoice_id.".";
        addNotification([
            Notification::NOTIFICATION_TYPE['Invoice Payment'],
            $userId,
            $title,
        ]);
    }
}
