<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Arr;

use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    protected $casts = [
    'role' => 'integer',
];
   
  

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        

        $this->middleware('guest');
        // $this->middleware('auth');

    }
    public function index(){
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
      
       
        

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'studentnummer' => ['required', 'string', 'max:50'],
            'klas' => ['required', 'string', 'max:4']

            // 
            // 
            // 

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {      
             $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
            'studentnummer' => $data['studentnummer'],
            'klas'     =>$data['klas'],
            'status' => "nogniet",
            'ophoogte'=> "#empty",
            'training'=> "#empty",
            'bijzonderheden'=> "#empty",
         

        ]);
      $user->roles()->attach(\App\Role::where('name', 'user')->first());
               
        return $user;
    }
}
