<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name',
        'creation_year',
        'player_count',
        'logo',
        'description',
    ];
    public function players()
    {
        return $this->hasMany(Player::class);
    }
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
