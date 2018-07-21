<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $infoContact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($infoContact)
    {
        $this->infoContact = $infoContact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'PRENDRE UN RDV';

        return $this->view('front.mail.contact')
                ->subject($subject);
    }
}
