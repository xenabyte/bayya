<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellerDisputeMail extends Mailable
{

    use Queueable, SerializesModels;

    public $merging_id;
    public $seller_email;
    public $dispute_reason;
    public $seller_username;
    public $buyer_username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller_email, $buyer_username, $seller_username, $dispute_reason, $merging_id)
    {
        //
        $this->buyer_username = $buyer_username;
        $this->seller_username = $seller_username;
        $this->seller_email = $seller_email;
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
        ->view('mails.seller_dispute_notification');
    }
}
