<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $body;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $body, $user=null)
    {
        //

        $this->email = $email;
        $this->name = $name;
        $this->body = $body;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('APP_NAME') .' Support Ticket')
            ->view('mails.support_admin');
    }
}
