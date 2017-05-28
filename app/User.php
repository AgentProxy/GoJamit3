<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Message;
use Illuminate\Support\Facades\DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'birthdate', 'username','sex','password','latitude','longitude'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function followers(){
        return $this->hasMany('App\Follow','following_id','id');
    }

    public function notifications(){
        return $this->hasMany('App\Notification','user_id','id');
    }

    public function following(){
        return $this->hasMany('App\Follow','follower_id','id');
    }

    public function genres(){
        return $this->belongsToMany('App\Genre','user_genres','user_id','genre_id');
    }

    public function instruments(){
         return $this->belongsToMany('App\Instrument','user_instruments','user_id','instrument_id');
    }

    public function posts(){
        return $this->hasMany('App\Post','user_id','id');
    }

    // public function likes(){
    //     return $this->hasMany('App\Like','user_id','id');
    // }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }

   public function setPasswordAttribute($password)
    {   
        $this->attributes['password'] = bcrypt($password);
    }

    public function getMessages() {
        // $message1 = DB::table('messages')
        //             ->select('sender_id','receiver_id', 'content', 'conversation_num', 'seen', 'created_at', 'updated_at', 'id')
        //             ->where('sender_id', Auth::user()->id)->orWhere('receiver_id',  Auth::user()->id)
        //             ->groupBy('conversation_num')
        //             ->orderBy('created_at', 'desc')
        //             ->get();

        $message1 = Message::
                    where('sender_id', Auth::user()->id)->orWhere('receiver_id',  Auth::user()->id)
                    ->groupBy('conversation_num')
                    ->orderBy('created_at', 'desc')
                    ->get();
                    

        return $message1;
    }

    public function getConversation($conversation_num) {
        // $message1 = DB::table('messages')
        //             ->select('sender_id','receiver_id', 'content', 'conversation_num', 'seen', 'created_at', 'updated_at', 'id')
        //             ->where('conversation_num', $conversation_num)
        //             ->get();

        $message1 = Message::
                    where('conversation_num', $conversation_num)
                    ->get();
                    
        return $message1;
    }

    public function getReceiver($receiver_id) {
        $receiver = DB::table('users')
                    ->select('fname', 'lname', 'email', 'birthdate', 'username','sex', 'id')
                    ->where('id', $receiver_id)
                    ->first();

        return $receiver;
    }

    public function getSender($sender_id) {
        $sender = DB::table('users')
                    ->select('fname', 'lname', 'email', 'birthdate', 'username','sex', 'id')
                    ->where('id', $sender_id)
                    ->first();

        return $sender;
    }

    public function sentMessages() {
        // $sent = DB::table('messages')
        //             ->select('sender_id','receiver_id', 'content', 'conversation_num', 'seen', 'created_at', 'updated_at', 'id')
        //             ->where('sender_id', Auth::user()->id)
        //             ->orderBy('created_at', 'desc')
        //             ->get();

        $sent =     Message::
                    where('sender_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return $sent;
    }
}
