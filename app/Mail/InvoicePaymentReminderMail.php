<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoicePaymentReminderMail extends Mailable
{
    use Queueable, SerializesModels;
    
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $invoiceNumber = $this->data->invoice_id;
        $invoiceId = $this->data->id;
        $dueDate = $this->data->due_date;
        $clientFullName = $this->data['client']['user']->full_name;
        $totalDueAmount = $this->data->final_amount - $this->data['payments']->sum('amount');
        $subject = "Payment Reminder of #$invoiceNumber Invoice ";

        return $this->view('emails.invoice_payment_reminder_mail',
            compact('invoiceNumber', 'invoiceId', 'clientFullName', 'totalDueAmount','dueDate'))
            ->markdown('emails.invoice_payment_reminder_mail')
            ->subject($subject);
    }
}
