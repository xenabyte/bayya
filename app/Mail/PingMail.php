<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PingMail extends Mailable
{
    use Queueable, SerializesModels;

    public $merging_id;
    public $receiver_email;
    public $receiver_username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver_email, $receiver_username, $merging_id)
    {
        //
        $this->receiver_username = $receiver_username;
        $this->receiver_email = $receiver_email;
        $this->merging_id = $merging_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('APP_NAME').' Ping Notification')
        ->view('mails.ping_notification');
    }
}
