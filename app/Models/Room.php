<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Room extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'channel_id',
        'name',
        'capacity',
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class, 'room_id');
    }

    public function sessionsRegistrations(): HasManyThrough
    {
        return $this->hasManyThrough(SessionRegistration::class, Session::class, 'room_id', 'session_id');
    }
}
