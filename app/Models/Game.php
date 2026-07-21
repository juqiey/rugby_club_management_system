<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'tournament_id',
        'home_team_id',
        'away_team_id',
        'game_date',
        'game_time',
        'location',
        'status',
        'home_score',
        'away_score',
        'stage'
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function homeTeam()
    {
        return $this->belongsTo(Club::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Club::class, 'away_team_id');
    }

    public function playerAppearance()
    {
        return $this->hasMany(PlayerAppearance::class);
    }

    public function playerMatchStats()
    {
        return $this->hasMany(PlayerMatchStat::class);
    }
}
