<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    function user() {
        return $this->belongsTo('App\Models\User');
    }

    function dish() {
        return $this->belongsTo('App\Models\Dish');
    }

}
