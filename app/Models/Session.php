<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Session extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'room_id',
        'title',
        'description',
        'speaker',
        'start',
        'end',
        'type',
        'cost',
    ];

    protected function casts(): array
    {
        return [
            'start' => 'date',
            'end' => 'date',
        ];
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function sessionRegistrations(): HasMany
    {
        return $this->hasMany(SessionRegistration::class, 'session_id');
    }
}
