<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_instrument extends Model
{
    protected $fillable = [
    	'user_id', 'instrument_id',
    ];

    public $timestamps = false;
}
