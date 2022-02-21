<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopScorer extends Model
{
    public function team()
    {
        return $this->hasOne(Team::class, 'id', 'team_id');
    }
}
