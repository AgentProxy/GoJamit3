<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Auth;
use DB;
use App\Http\Controllers\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id); 
        $user_id = $user->id;

        $following = Follow::where('follower_id', $user_id)->pluck('following_id');

        $posts = Post::orderBy('id', 'desc')->whereIn('user_id',$following)->orWhere('user_id',$user_id)->get();

        return view('home', compact('user','posts'));
    }

}
