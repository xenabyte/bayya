<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'merging_id',
        'sender_user_id',
        'message',
    ];

    /**
     * Get the user that owns the Conversation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'sender_user_id');
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
