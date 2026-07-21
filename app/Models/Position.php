<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
      'name',
      'position_group',
      'format'
    ];

    public function playerPosition(){
      return $this->hasMany(PlayerPosition::class);
    }
}
