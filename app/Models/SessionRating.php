<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SessionRating extends Model
{
    public $timestamps = false;

    protected $table = 'session_rating';

    protected $fillable = [
        'attendee_id',
        'rating',
        'created_at',
        'session_id',
    ];

    public function attendee(): BelongsTo
    {
        return $this->belongsTo(Attendee::class);
    }

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }
}
