<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $name;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $name, $body)
    {
        //

        $this->user = $user;
        $this->name = $name;
        $this->body = $body;
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
