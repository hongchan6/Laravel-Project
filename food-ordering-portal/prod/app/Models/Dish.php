<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'description', 'promotion', 'photo', 'user_id'];



    function photos(){
        return $this->hasMany('App\Models\Photo');
    }
}