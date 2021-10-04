<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuyerDisputeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $merging_id;
    public $buyer_email;
    public $dispute_reason;
    public $buyer_username;
    public $seller_username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($buyer_email, $seller_username, $buyer_username, $dispute_reason, $merging_id)
    {
        //
        $this->buyer_username = $buyer_username;
        $this->seller_username = $seller_username;
        $this->buyer_email = $buyer_email;
        $this->dispute_reason = $dispute_reason;
        $this->merging_id = $merging_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('APP_NAME').' Dispute Notification')
        ->view('mails.buyer_dispute_notification');
    }
}
