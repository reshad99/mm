<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
}
