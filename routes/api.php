<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('register',function(){
    if(session()->has('keyvalue')){
        return redirect(route('profile.session'));
    }
    return view('register');

})->name('register.session');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register',[LoginController::class,'register']);
Route::post('login',[LoginController::class,'authenticate']);
Route::get('reply',[LoginController::class,'getvalue']);

//new api routing
Route::post('addUser',[LoginController::class,'addUser']);
Route::put('editUser',[LoginController::class,'updateUser']);
Route::delete('delete',[LoginController::class,'delete']);
Route::get('getdata',[LoginController::class,'getData']);
Route::get('getsingle/{id}',[LoginController::class,'getSingleUser']);



Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});