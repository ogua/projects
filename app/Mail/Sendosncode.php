<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Sendosncode extends Mailable
{
    use Queueable, SerializesModels;

    public $osncode;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($osncode)
    {
        $this->osncode = $osncode;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->from('info@amtabiz.com')
         ->view('Mail_Template.osn_code_mail');
    }
}
