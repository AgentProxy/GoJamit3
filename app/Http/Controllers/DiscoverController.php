<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Genre;

class DiscoverController extends Controller
{
    //
    public function index($username){

      $user = User::whereUsername($username)->first();
      $user = User::findOrFail($user->id);

        return view('discover.discover',compact('user'));
    }

    public function discover(Request $request){
        $user = User::findOrFail(Auth::user()->id);

        //$user->update(number_format($request->input('latitude'),8,'.',''));
        $user['latitude'] = (number_format($request->latitude,8,'.',''));
        $user['longitude'] = (number_format($request->longitude,8,'.',''));
        $user->update();

        $following_ids = array();
        foreach($user->following as $following_user){
               $following_ids[] = array(
                'id'=>$following_user->following->id,
             );
        }

       $follow_users = User::select()->whereNotIn('id',$following_ids)->get();  
       $jammers = array();
       
       foreach ($follow_users as $follow_user) {
           if($follow_user->age == 0){
                 echo $follow_user->fname;
                $jammers[] = $follow_user;
                // if($follow_user)
                // foreach ($follow_user->genres as $genre) {
                        $genres = $follow_user->genres;
                        foreach($genres as $genre){
                            //echo $genre->genre;
                        }
                // }
           }
       }

       //$genres = Genre::all();
       // Genre::select()->whereNotIn('id',$following_ids)->where('user_id',$user->id)->get();

       // foreach($genres as $genre){
       //      echo $genre->user;
       //      echo "<\br>";
       // }
       //return $genres->user;
       // foreach($jammers as $jammer){
       //      echo $jammer->genres;
       // }

      // return $jammers->genres->get();

        //return view("discover.jammers", compact('follow_users'));

    }

}
