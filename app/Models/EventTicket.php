<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventTicket extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'name',
        'cost',
        'special_validity',
    ];

    protected function casts(): array
    {
        return [
            'special_validity' => 'array'
        ];
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'ticket_id', 'id');
    }

    public function isValid(): bool
    {
        $type = $this->special_validity['type'];
        if ($type === 'amount') {
            return count($this->registrations) < $this->special_validity['amount'];
        } else if ($type === 'date') {
            $carbon = Carbon::createFromFormat('Y-m-d', $this->special_validity['date']);
            return $carbon->isFuture();
        }
        return true;
    }
}
