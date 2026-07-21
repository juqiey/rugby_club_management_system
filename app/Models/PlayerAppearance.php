<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlayerAppearance extends Model
{
    protected $fillable = [
        'player_id',
        'game_id',
        'remark',
        'position_id',
        'is_started',
        'is_substituted',
        'is_captain',
        'minutes_played',
    ];

    public function players(){
        return $this->belongsTo(Player::class);
    }

    public function games(){
        return $this->belongsTo(Game::class);
    }
}
