<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_user_id',
        'seller_payment_mode',
        'selling_amount',
        'selling_rate',
        'currency',
        'buyer_id',
        'buyer_user_id',
        'merge_status',
        'merge_at',
        'merging_id',
        'trade_minutes',
        'hash',
        'trade_terms',
    ];

    /**
     * Get the associated_seller that owns the Seller
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_user_id');
    }

    /**
     * Get the seller that owns the Seller
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    /**
     * Get the merging associated with the Seller
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function merging()
    {
        return $this->hasOne(Merging::class, 'seller_id');
    }
}
