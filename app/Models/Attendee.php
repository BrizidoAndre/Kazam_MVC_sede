<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Attendee extends Authenticatable
{
    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'registration_code',
        'login_token',
    ];

    public function registrations(): HasMany
    {
        return $this->hasMany(Registration::class, 'attendee_id');
    }
}
