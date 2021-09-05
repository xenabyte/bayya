<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'merging_id',
        'reviewee_user_id',
        'reviewer_user_id',
        'reviewer_username',
        'star_rating',
        'review',
    ];

    /**
     * Get the reviewer that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_user_id');
    }

     /**
     * Get the reviewee that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewee()
    {
        return $this->belongsTo(User::class, 'reviewee_user_id');
    }

     /**
     * Get the merging that owns the Review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function merging()
    {
        return $this->belongsTo(Merging::class, 'merging_id');
    }
}
