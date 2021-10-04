<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BuyerNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $seller_username;
    public $seller_email;
    public $selling_amount;
    public $selling_rate;
    public $buyer_username;
    public $buyer_email;
    public $currency;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($seller_username, $seller_email, $selling_amount, $selling_rate,  $buyer_username, $buyer_email, $currency)
    {
        //

        $this->seller_username = $seller_username;
        $this->seller_email = $seller_email;
        $this->selling_amount = $selling_amount;
        $this->selling_rate = $selling_rate;
        $this->buyer_username = $buyer_username;
        $this->buyer_email = $buyer_email;
        $this->currency = $currency;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(env('APP_NAME').' Buyer Notification')
        ->view('mails.buyer_notification');
    }
}
