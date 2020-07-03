<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    private $creds = array(
        "name" => "name",
        "id"    => "id",
        'email' => "email",
        "background" => "background",
        "profile_image" => "profile_image",
        "opleiding" => "opleiding",
        "github" => "github",
        "gitlab" => "gitlab",
        "linkedin" => "linkedin",
        "klas" => "klas",
        "about" => "about",
        "website" => "website",
        "contactemail" => "contactemail"
    );
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
     * @return \Illuminate\Contracts\Support\Renderable
     */

     public function home(){
        if (Auth::check()) {
            if(Auth::user()->status == "ingeschreven"){
                return view('website/ingeschreven');

             }else{
                $vragen = DB::table('formulier')
                 ->where('id','1')
                 ->first();
                $vraag1 =DB::table('vraag1')
                ->get('vraag'); 
                $vraag2 =DB::table('vraag2')
                ->get('vraag'); 
                return view('website/home',['vragen' => $vragen,'vraag1'=> $vraag1,'vraag2'=> $vraag2]);
    
             }
        }else{
            return redirect('login');
        }

     }
     public function signup(Request $req){
         DB::table('users')
         ->where('id',Auth::user()->id)
         ->update([
             'status' => "ingeschreven",
             'ophoogte'=> $req->ophoogte,
             'training'=> $req->training,
             'bijzonderheden'=> $req->bijzonderheden,

         ]);
         return redirect()->route('home');

    }
   
   

    
    
}
