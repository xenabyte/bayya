<?php

namespace App\Models;

use App\Notifications\UserResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone_number',
        'usd_wallet',
        'btc_wallet',
        'btc_address',
        'bonus',
        'username',
        'referrer',
        'email',
        'password',
        'kycfront',
        'kycback',
        'status',
        'viewable_password',
        'ip_address',
        'location',
        'currency',
        'email_verified_at',
        'verification_code'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }

    /**
     * Get all of the buyer for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyer()
    {
        return $this->hasMany(Buyer::class, 'buyer_user_id');
    }

    /**
     * Get all of the seller for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seller()
    {
        return $this->hasMany(Seller::class, 'buyer_user_id');
    }

    /**
     * Get all of the conversation for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function conversation()
    {
        return $this->HasMany(Conversation::class, 'sender_user_id');
    }


    /**
     * Get all of the dispute_buyer for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispute_buyer()
    {
        return $this->HasMany(Dispute::class, 'buyer_user_id');
    }

     /**
     * Get all of the dispute_seller for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dispute_seller()
    {
        return $this->HasMany(Dispute::class, 'sender_user_id');
    }

    /**
     * Get all of the payout for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payout()
    {
        return $this->HasMany(Payout::class, 'user_id');
    }

    /**
     * Get all of the reviewee for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviewee()
    {
        return $this->HasMany(Review::class, 'reviewee_user_id');
    }

    /**
     * Get all of the reviewee for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviewer()
    {
        return $this->HasMany(Review::class, 'reviewer_user_id');
    }

    /**
     * Get all of the buyer_transaction for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyer_transaction()
    {
        return $this->HasMany(Transaction::class, 'buyer_user_id');
    }

    /**
     * Get all of the buyer_transaction for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function seller_transaction()
    {
        return $this->HasMany(Transaction::class, 'sender_user_id');
    }

    public function loginSecurity()
    {
        return $this->hasOne(LoginSecurity::class);
    }

}
