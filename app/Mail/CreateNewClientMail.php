<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateNewClientMail extends Mailable
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
        $clientName = $this->data['first_name'].' '.$this->data['last_name'];
        $userName = $this->data['email'];
        $password = $this->data['client_password'];
        $subject = "Welcome ".$clientName.' to '.getAppName();

        return $this->view('emails.create_new_client_mail',
            compact('clientName', 'userName','password'))
            ->markdown('emails.create_new_client_mail')
            ->subject($subject);
    }
}
    
