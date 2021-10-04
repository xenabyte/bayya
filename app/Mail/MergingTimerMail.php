<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MergingTimerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $merging_id;
    public $buyer_email;
    public $buyer_username;
    public $seller_username;
    public $dueDate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buyer_email, $buyer_username, $seller_username, $merging_id, $dueDate)
    {
        //
        $this->buyer_username = $buyer_username;
        $this->buyer_email = $buyer_email;
        $this->merging_id = $merging_id;
        $this->seller_username = $seller_username;
        $this->dueDate = $dueDate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('APP_NAME').' Transaction Notification')
        ->view('mails.merging_trade_notification');
    }
}
