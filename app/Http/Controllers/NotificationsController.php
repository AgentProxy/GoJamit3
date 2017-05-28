<?php

namespace App\Http\Controllers;
use App\User;
use App\Notification;
use App\Post;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index($username)
    {
        //


        $user = User::whereUsername($username)->first();
        $user_id = $user->id;
        $notifications = Notification::where('user_id', $user_id)->where('notifier_id','!=',$user_id)->orderBy('created_at','desc')
               ->get();
        Notification::where('user_id', $user_id)->where('seen','0')
               ->update(['seen' => '1']);

             
        $post = Post::all();

        return view('notifications.index', compact('notifications','user','post'));

    }
}
