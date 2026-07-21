<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name',
        'location',
        'type',
        'logo',
        'email',
        'phone_no',
    ];

    public function playerRepresentations()
    {
        return $this->hasMany(PlayerRepresentation::class);
    }
}
