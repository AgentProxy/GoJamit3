<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use App\Instrument;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'password.regex' => 'Password must be at least 8 characters long and must contain at least a single digit',
            'username.min' => 'Username must be at least :min',
        ];

        return Validator::make($data, [
            'username' => 'required|min:3',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|min:8|confirmed|regex:/^(?=,*[A-Za-z])(?=,*\d)[A-Za-z\d]{8,}$/',
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
         $user = User::create([
            'email' => $data['email'],
            'prof_pic'=> null,
            'sex' => $data['sex'],
            'latitude'=> null,
            'longitude'=> null,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'birthdate' => $data['birthdate'],
            'username' => $data['username'],
            // 'password' => bcrypt($data['password'])
            'password' => $data['password']
        ]);

        $instruments = Input::get('instruments');
        if($instruments!=""){
            foreach($instruments as $instrument){
                DB::table('user_instruments')->insert(
                array('user_id'=>($user->id),'instrument_id'=>$instrument)
                );
            }
        }

        $genres = Input::get('genres');
        if($genres!=""){
            foreach($genres as $genre){
                DB::table('user_genres')->insert(
                array('user_id'=>($user->id),'genre_id'=>$genre)
                );
            }
        }



        return $user;
        
    

    }
}
