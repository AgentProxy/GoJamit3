<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Genre;
use Illuminate\Support\Facades\Input;

class DiscoverController extends Controller
{
    //
    public function index(){

      $user = User::findOrFail(Auth::user()->id);

      return view('discover.discover',compact('user'));
    }

    public function discover(Request $request){
      $user = User::findOrFail(Auth::user()->id);
      $user['latitude'] = (number_format($request->latitude,8,'.',''));
      $user['longitude'] = (number_format($request->longitude,8,'.',''));
      $user->update();

       echo $user['latitude']." ".$user['longitude'];

      $age = $request->age_slider;
      $distance = $request->distance_slider;
      $sex = $request->sex;

      $following_ids = array();
      foreach($user->following as $following_user){
             $following_ids[] = array(
              'id'=>$following_user->following->id,
           );
      }

      $follow_users = User::select()->whereNotIn('id',$following_ids)->Where('id','!=',Auth::user()->id)->get();  
      $jammers = array();

    /*
    Description: Distance calculation from the latitude/longitude of 2 points
    Author: Rajesh Singh (2014)
    Website: http://AssemblySys.com
     
    If you find this script useful, you can show your
    appreciation by getting Rajesh a cup of coffee ;)
    PayPal: rajesh.singh@assemblysys.com
     
    As long as this notice (including author name and details) is included and
    UNALTERED, this code is licensed under the GNU General Public License version 3:
    http://www.gnu.org/licenses/gpl.html
    */
     
    function distanceCalculation($point1_lat, $point1_long, $point2_lat, $point2_long, $decimals = 2) {
      // Calculate the distance in degrees
      $degrees = rad2deg(acos((sin(deg2rad($point1_lat))*sin(deg2rad($point2_lat))) + (cos(deg2rad($point1_lat))*cos(deg2rad($point2_lat))*cos(deg2rad($point1_long-$point2_long)))));
     
      // Convert the distance in degrees to the chosen unit (kilometres, miles or nautical miles)

      $distance = $degrees * 111.13384; // 1 degree = 111.13384 km, based on the average diameter of the Earth (12,735 km)
      return round($distance, 2);
    }
       
    foreach ($follow_users as $follow_user) {
      if(($follow_user->age <= $age && $follow_user->age >= '16')&&($follow_user->sex == $sex)){
        // echo d
        // echo $follow_user->fname."distance based: ".$distance." Distance: ".distanceCalculation($user['latitude'],$user['longitude'],$follow_user->latitude,$follow_user->longitude, $decimals = 2)."\n";
        if(distanceCalculation($user['latitude'],$user['longitude'],$follow_user->latitude,$follow_user->longitude, $decimals = 2)<=$distance){
          $jammers[] = $follow_user;
        }
      }
    }
       return view('discover.jammers', compact('jammers'));
    }

}
