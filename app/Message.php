<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;
use Illuminate\Support\Facades\DB;
use Auth;

class Message extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'content', 'sender_id', 'seen', 'receiver_id', 'conversation_num',
    ];

    public function nameReceiver() {
        return $this->hasOne('App\User','id', 'receiver_id');
    }

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function nameSender() {
        return $this->hasOne('App\User','id', 'sender_id');
    }

    public function getNewConv() {
        $conversation_num = DB::table('messages')->max('conversation_num');
        return $conversation_num;
    }

}
