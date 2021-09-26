<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merging extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_user_id',
        'buyer_id',
        'payment_status',
        'seller_id',
        'seller_user_id',
        'seller_consent',
        'pay_received_status',
        'merge_at',
    ];

    /**
     * Get the buyer that owns the Merging
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    /**
     * Get the associated_buyer that owns the Merging
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function associated_buyer()
    {
        return $this->belongsTo(User::class, 'buyer_user_id');
    }

    /**
     * Get the associated_seller that owns the Merging
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function associated_seller()
    {
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    /**
     * Get the seller that owns the Merging
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->hasOne(Seller::class);
    }
}
