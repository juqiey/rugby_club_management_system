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

    function playerPositions()
    {
        return $this->hasMany(PlayerPosition::class);
    }

    function playerAppearances()
    {
        return $this->hasMany(PlayerAppearance::class);
    }

    function playerAppearance(){
        return $this->hasMany(PlayerAppearance::class);
    }

    function playerMatchStats()
    {
        return $this->hasMany(PlayerMatchStat::class);
    }

    function playerRepresentation(){
        return $this->hasMany(PlayerRepresentation::class);
    }
}
