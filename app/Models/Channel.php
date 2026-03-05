<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Channel extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'name',
    ];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'channel_id');
    }

    public function sessions(): HasManyThrough
    {
        return $this->hasManyThrough(Session::class, Room::class, 'channel_id', 'room_id');
    }

}
