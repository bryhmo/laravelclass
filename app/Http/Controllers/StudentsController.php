<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class StudentsController extends Controller
{
    //fuction getuser
    public function index(){
       $data = DB::select("select * from students");
       return json_encode($data);
    }

    public function getUser(){
        // return Student::all();
        // return Student::find(25,'email');
        // return Student::all('email');
        // return Student::all(['firstname','lastname']);
      /*   $user= Student::all();
        return $user; */

        // $user= Student::find([7,13,27,105]);
        // return json_encode($user);
    }

    //htpp client
    public function getHttp(){
        return Http::get("reqres.in/api/users?page=1");
    }


    public function Users(){
        $data=  Student::all();
        return view('student',['users'=>$data]);
    }


//working on session
    public function getSession(Request $request){
        $data = $request->input();
        $request->session()->put('keyvalue',$data['firstname']);
        // dd(session('keyvalue'));
        if(session('keyvalue')){
            return redirect(route('profile.student'));
        }
    }

    //file upload 
    public function upload(Request $request){
        $data = $request->file('photo')->store('images');
        dd($data);
    }
  

   

    

   



}