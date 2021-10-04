<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellerApproveMail extends Mailable
{
    use Queueable, SerializesModels;

    public $merging_id;
    public $seller_email;
    public $seller_username;
    public $buyer_username;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller_email, $buyer_username, $seller_username, $merging_id)
    {
        //
        $this->seller_username = $seller_username;
        $this->seller_email = $seller_email;
        $this->merging_id = $merging_id;
        $this->buyer_username = $buyer_username;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('APP_NAME').' Payment Notification')
        ->view('mails.seller_approve_notification');
    }
}
