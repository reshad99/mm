<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameStage extends Model
{
    public function games()
    {
        return $this->hasMany(Game::class, 'game_stages_id');
    }
}
