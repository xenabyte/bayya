<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_label',
        'merging_id',
        'seller_user_id',
        'buyer_user_id',
        'transaction_status',
        'verified_at',
    ];

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
}
