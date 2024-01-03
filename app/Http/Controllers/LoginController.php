<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
// public function registerUser(Request $request)
// {
  /*   $rules = [
        'lastname'=>'required',
        'firstname' => 'required',
        'username'=>'required',
        'email'    => 'unique:users|required',
        'password' => 'required',

    ];

    $input     = $request->only('username', 'email','password','lastname','firtsname');
    $validator = Validator($input, $rules);

    if ($validator->fails()) {
        return response()->json(['success' => false, 'error' => $validator->messages()]);
    }
    $name = $request->name;
    $email    = $request->email;
    $password = $request->password;
    $lastname = $request->lastname;
    $firstname = $request->firstname;
    $user     = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password),'lastname'=>$lastname,'firstname'=>$firstname]);
}


public function Login(){
    return "you are login successfully";
}
 */


public function register(Request $request) 
    {
        
        $validator = Validator($request->all(),[

            'username'  => 'required',

            'email'    => 'required',

            'password' => 'required',

            'firstname'=> 'required',

            'lastname'=>'required',

        ]);

        if($validator->fails()) {

            return response()->json([

                'success' => false,

                'message' => $validator->errors()->first()

            ]);

        }

        $user = User::create([

            'username'=> $request->name,

            'email'=> $request->email,

            'password'=> Hash::make($request->password),

            'firstname'=>$request->firstname,

            'lastname'=>$request->lastname

        ]);

        $user->createToken('token')->accessToken;

        return response()->json([

            'success' => true,

            'message' => 'User register successfully.'

        ]);

    }
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }




    public function logout(){
        if(session()->has('keyvalue')){
            session()->pull('keyvalue');
            return redirect(route('register.session'));
        }
        else
        {
            return view('profile');
        }
    }

public function getvalue(){
    return response("success");
}

public function addUser(Request $request){
    $users = new User();
    $users->lastname = $request->lastname;
    $users->firstname = $request->firstname;
    $users->username = $request->username;
    $users->email = $request->email;
    $users->password = $request->password;
    $users->save();
    if($users){
        return 
        response()
            ->json(
                'user record added successfully'
            );
    }
    else{
        return 
        "error sorry i was unable to add the record ";
    }
    
}

public function updateUser(Request $request){
    $users = User::findorfail($request->id);
    $users->lastname = $request->lastname;
    $users->firstname = $request->firstname;
    $users->username = $request->username;
    $users->email = $request->email;
    $users->password = $request->password;
    $users->update();
    if($users){
        return response()
                ->json(
                    'user record updated successfully'
                );
    }
    else{
        return 
        "error sorry i was unable to update the record ";
    }
    
}

public function delete(Request $request){
    $user = User::findorfail($request->id)->delete();

    if($user){
        return response()->json("user with ID $request->id was deleted successfully");
    }

}


public function getData(){
    $getAllUsers = User::all();
    return response()
        ->json(
            $getAllUsers
        );
}

public function getSingleUser(Request $request){
    $singleUser = User::findorfail($request->id);
    return response()->json($request->id);
}
}
