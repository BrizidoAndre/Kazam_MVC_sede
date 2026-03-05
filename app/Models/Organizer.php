<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Organizer extends Authenticatable
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'email',
        'password_hash',
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }
}
