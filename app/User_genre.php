<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_genre extends Model
{
    protected $fillable = [
    	'user_id', 'genre_id',
    ];

    public $timestamps = false;
}
