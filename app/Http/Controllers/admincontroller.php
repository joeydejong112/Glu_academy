<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    private $creds = array(
        "name" => "name",
        "id"    => "id",
        "email" => "email",
        "klas" => "klas",
        "status"=>"status",
        "studentnummer"=> "studentnummer",
        "ophoogte" => "ophoogte",
        "training"=> "training",
        "bijzonderheden"=>"bijzonderheden"

       
    );
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home(){
        $vraag1 = DB::table('vraag1')->get();
        $vraag2 = DB::table('vraag2')->first();

        $users = DB::table('users')->orderBy('id', 'asc')
            ->select($this->creds)
            ->get();

        return view('admin/admin',['users'=> $users,'vraag1'=> $vraag1]);

    }
    public function delete($token){
        DB::table('users')
        ->where('id', $token)
        ->delete();
    }
    public function update(Request $req){
        DB::table('users')
        ->where('id',$req->id)
        ->update([
            "name" => $req->naam,
            "email"=> $req->email,
            "klas"=> $req->klas,
            "status" => $req->status,
            "ophoogte" => $req->ophoogte,
            "training" =>$req->training,
            "bijzonderheden" =>$req->bijzonderheden,
        ]);
        return redirect()->route('home');

    }

    public function vraagdelete(Request $req){
        DB::table('vraag1')
        ->where('id',$req->id)
        ->delete();
        return redirect()->route('admin');

    }
    public function vraagadd(Request $req){
        DB::table('vraag1')
        ->insert([
            'vraag' => $req->training
        ]);
        return redirect()->route('admin');

    }
    public function vraagedit(Request $req){
       
        DB::table('vraag1')
        ->where('id',$req->id)
        ->update([
            'id' => $req->id,
            'vraag' => $req->training,
        ]);
        return redirect()->route('admin');
    }
}
