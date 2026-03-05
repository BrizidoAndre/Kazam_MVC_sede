<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Event extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'organizer_id',
        'name',
        'slug',
        'date',
    ];

    protected function casts(): array
    {
        return [
            'date' => 'date',
        ];
    }

    public function eventTickets(): HasMany
    {
        return $this->hasMany(EventTicket::class, 'event_id');
    }

    public function registrations(): HasManyThrough
    {
        return $this->hasManyThrough(Registration::class, EventTicket::class, 'event_id', 'ticket_id');
    }

    public function channels(): HasMany
    {
        return $this->hasMany(Channel::class, 'event_id');
    }

    public function rooms(): HasManyThrough
    {
        return $this->hasManyThrough(Room::class, Channel::class, 'event_id', 'channel_id');
    }

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(Organizer::class);
    }

    static public function getFromUser()
    {
        return self::query()->where(['organizer_id' => auth()->id()]);
    }

    public function getFromRooms()
    {
        $actualQuantity = 0;
    }

    /**
     * @return Session[]
     */
    public function getSessions()
    {
        return $this->channels->flatMap(function ($channel) {
            return $channel->rooms->flatMap(function ($room) {
                return $room->sessions;
            });
        });
    }
}
