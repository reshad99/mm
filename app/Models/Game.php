<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function team1()
    {
        return $this->hasOne('App\Models\Team', 'id', 'team_id_1');
    }

    public function team2()
    {
        return $this->hasOne('App\Models\Team', 'id', 'team_id_2');
    }

    public function game_stage()
    {
        return $this->hasOne(GameStage::class, 'id', 'game_stages_id');
    }

}
