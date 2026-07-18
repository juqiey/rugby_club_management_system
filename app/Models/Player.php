<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'position',
        'date_of_birth',
        'batch',
        'age',
        'status',
        'profile_url',
    ];
}
