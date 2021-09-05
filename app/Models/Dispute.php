<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispute extends Model
{
    use HasFactory;

    protected $fillable = [
        'merging_id',
        'buyer_id',
        'buyer_user_id',
        'sender_user_id',
        'seller_id',
        'dispute_reason',
        'dispute_status',
        'resolved_at',
    ];




    /**
     * Get the buyer that owns the Dispute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'buyer_id');
    }

    /**
     * Get the seller that owns the Dispute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function seller()
    {
        return $this->belongsTo(Seller::class, 'seller_id');
    }


    /**
     * Get the merging that owns the Conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merging()
    {
        return $this->belongsTo(Merging::class, 'merging_id');
    }
}
