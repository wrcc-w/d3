<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceCreateClientMail extends Mailable
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
        $invoiceId = $this->data['invoiceData']['id'];
        $clientName = $this->data['clientData']['first_name'].' '.$this->data['clientData']['last_name'];
        $invoiceNumber = $this->data['invoiceData']['invoice_id'];
        $invoiceDate = $this->data['invoiceData']['invoice_date'];
        $dueDate = $this->data['invoiceData']['due_date'];
        $subject = "Invoice #$invoiceNumber Created";

        return $this->view('emails.create_invoice_client_mail',
            compact('clientName', 'invoiceNumber', 'invoiceDate', 'dueDate', 'invoiceId'))
            ->markdown('emails.create_invoice_client_mail')
            ->subject($subject);
    }
}
