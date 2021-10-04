<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $data;
    public $subject;
    public $type;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $data, $subject, $type)
    {
        //

        $this->user = $user;
        $this->data = $data;
        $this->subject = $subject;
        $this->type = $type;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view('mails.notification');
    }
}
