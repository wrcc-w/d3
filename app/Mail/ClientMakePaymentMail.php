<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientMakePaymentMail extends Mailable
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
        $adminName = $this->data['first_name'].' '.$this->data['last_name'];
        $invoiceNo = $this->data['invoice']['invoice_id'];
        $receivedAmount = $this->data['amount'];
        $receivedDate = $this->data['payment_date'];
        $invoiceId = $this->data['invoice_id'];
        $subject = "#$invoiceNo Invoice Payment Received.";

        return $this->view('emails.client_make_payment_mail',
            compact('adminName', 'invoiceNo', 'receivedAmount', 'receivedDate','invoiceId'))
            ->markdown('emails.client_make_payment_mail')
            ->subject($subject);
    }
}
