<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class orderscontroller extends Controller
{
    //
    public function index(){
        $lists = ['faith','promise','jame','alfred','favour','abdullah'];
        return Blade::render(
            '<h1 style="color:red;text-align:center">promise</h1>'
        );
    }

    public function getdata(Request $request){
        $data = $request->validate([
            'email'=>'required|email',
            'firstname'=>'required|min:3|max:15',
            'lastname'=>'required|min:3|max:15',
           
            'studentid'=>'required',
            'password'=>'required|confirmed'
            
        ]);
        return json_encode($data);
        // $data = $request->input();
        // return dd($data);
    }
}
