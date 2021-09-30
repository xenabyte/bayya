<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'ticket_id',
        'comment',
    ];

    protected $table = 'ticket_answers';

    /**
     * Get the user that owns the Payout
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the trade that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trade()
    {
        return $this->belongsTo(Merging::class, 'trade_id');
    }

    /**
     * Get all of the ticket_answere for the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ticket_answer()
    {
        return $this->hasMany(TicketAnswer::class);
    }

    /**
     * Get the admin that owns the TicketAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
