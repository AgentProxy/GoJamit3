<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Notification;
use Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Genre;
use App\User_genre;
use App\Instrument;
use App\User_instrument;

class ProfileController extends Controller
{

    public function __construnct(){
        $this->middleware('auth');
    }

    public function profile($username){
        $user = User::whereUsername($username)->first();

        $followed = Follow::where('following_id',$user->id)
        ->where('follower_id',Auth::user()->id);

        if($followed==""){
            $followed='false';
        }
        else{
            $followed ='true';
        }

        return view('user.profile',compact('user','followed'));
    }


    

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($username)
    {
        //
        $user = User::whereUsername($username)->first();
        $genres =  Genre::all();
        $user_genres = User_genre::whereUser_id(Auth::user()->id)->get();
        $instruments =  Instrument::all();
        $user_instruments = User_instrument::whereUser_id(Auth::user()->id)->get();

        return view('user.settings',compact('user', 'genres', 'user_genres', 'instruments', 'user_instruments'));
    }

    public function about($username)
    {
        $user = User::whereUsername($username)->first();

        $followed = Follow::where('following_id',$user->id)
                    ->where('follower_id',Auth::user()->id)->first();

        if($followed==""){
            $followed='false';
        }

        else{
            $followed ='true';
        }
        // echo $followed;
        return view('user.about',compact('user','followed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
        $genres = $request->input('genres');
        $instruments = $request->input('instruments');

        User_genre::where('user_id', Auth::user()->id)->delete();
        User_instrument::where('user_id', Auth::user()->id)->delete();

        foreach ($genres as $key => $value) {
            User_genre::create([
                'user_id'=>Auth::user()->id,
                'genre_id'=>$value,
            ]);
        }

        foreach ($instruments as $key => $value) {
            User_instrument::create([
                'user_id'=>Auth::user()->id,
                'instrument_id'=>$value,
            ]);
        }
        

        $user = User::findOrFail($id);
        $user->update($request->all());

        $username = $request['username'];


        return redirect('profile/'.$username.'/about');
    }

    public function updatePhoto(Request $request, $id){
        // echo $request['prof_pic'];
        $user = User::findOrFail($id);
        // $file = $request['prof_pic'];

        $file = $request->file('prof_pic');
        // echo $request->hasFile('prof_pic');
        $filename = uniqid(null, true) . '-' . $file->getClientOriginalName();
        $file->move('img-uploads',$filename);
        $user->prof_pic = $filename;
        $user->save();
        // return redirect('/home');
        return redirect("/profile/".$user->username."/posts");
    }

    public function returnDiscover($username){
        $user = User::whereUsername($username)->first();
        return view('discover.discover',compact('user'));
        // return view('discover.discover');
    }

    public function followUser($username){
        $follow = new Follow;
        $user_id= User::whereUsername($username)->first()->id;

        $follow->following_id = $user_id;
        $follow->follower_id= Auth::user()->id;
        $follow->save();

        $user=User::find($user_id);
        $followers = array();

         foreach($user->followers as $follower_user){
            $follower_array[] = array(
                'username'=>$follower_user->follower->username,
                 'name'=>$follower_user->follower->fname
             );
         } 

        $notification = new Notification;
        $notification->user_id = $user_id;
        $notification->seen = '0';
        $notification->type = '1';
        $notification->notif_id = Auth::user()->id;
        $notification->notifier_id = Auth::user()->id;
        $notification->save();

        return $follower_array;
    }

    public function unfollowUser($username){
        $user_id = User::whereUsername($username)->first()->id;
        $deletedRows = Follow::where('following_id', $user_id)
        ->where('follower_id',(Auth::user()->id))
        ->delete();

        $user = User::find($user_id);
        $follower_array =[];
        foreach($user->followers as $follower_user){
            $follower_array[] = array(
                'username'=>$follower_user->follower->username,
                 'name'=>$follower_user->follower->fname
             );
         } 

        return $follower_array;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }


}
