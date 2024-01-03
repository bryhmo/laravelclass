<?php

// use App\Http\Controllers\orderscontroller;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\NineController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\orderscontroller;
use Faker\Guesser\Name;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('noaccess',function(){
    return view('noaccess');
});


Route::view('twourl.com','page2');
Route::view('threeurl.com','page3');
Route::view('footer.com','footer');
Route::view('header.com','header');
Route::view('abdul.com','body');

Route::get('list.com',[orderscontroller::class,'index']);
Route::PATCH('get',[orderscontroller::class,'getdata']);



Route::get('lincon.com',function(){
    return view('page2');
});


//Group middlewares Route
Route::group(['middleware'=>['ProtectedPage']], function(){
   
});

Route::get('/', function () {
    return view('welcome');
});
Route::view('oneurl.com','page1');

Route::get('year', function(){
    return view('year');
});

Route::get('student.com',[StudentsController::class,'index']);
Route::get('getuser',[StudentsController::class,'getUser']);
Route::get('gethttp',[StudentsController::class,'getHttp']);
Route::get('display',[StudentsController::class,'Users']);



Route::post('getsession',[StudentsController::class,'MakeSession'])->name('session.loggin');
Route::POST('upload',[StudentsController::class,'FileUpload'])->name('file.upload');

// Route::get('upload.com',function(){
//     return view('upload');
// });

Route::view('upload','upload');

//register user
// Route::get('register',function(){
//     return view('register');
// });




/* Route::get('profile',function(){
    if(!session()->has('keyvalue')){
        return redirect(route('register.session'))->with('error','please login using the form');
    }
    return view('profile');

})->name('profile.session'); */

 
//loggin page session
Route::get('register',function(){
    if(session()->has('keyvalue')){
        return redirect(route('profile.session'));
    }
    return view('register');

})->name('register.session');


//logout Route
Route::get('logout',function(){
    if(session()->has('keyvalue')){
        session()->pull('keyvalue');
        return redirect(route('register.session'));
    }
    else
    {
        return view('profile');
    }

})->name('logout.session');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('loginUsers',[LoginController::class,'Login']);




//session start route
Route::post('getsession1',[StudentsController::class,'getSession'])->name('student.session');


//loging session route
Route::get('log',function(){
    if(session()->has('keyvalue')){
        return redirect(route('profile.student'));
    }
    else{
        return view('log');
    }

})->name('log.student');


//profile session route
Route::get('profile',function(){
    if(!session()->has('keyvalue')){
        return redirect(route('log.student'))->with('error','please loggin by filling the LOgin form');
    }
    else{

    }
})->name('profile.student');

Route::get('logg',function(){
    if(session()->has('keyvalue')){
        session()->pull('keyvalue');
        return redirect(route('log.student'));
    }
})->name('logout.student');


// name('login.student')

// route('login.student')

//href = {{route('name')}}


//file upload in laravel
// Route::get('upload',function(){
//     return view('file');
// });

// Route::post('file',[StudentsController::class,'upload'])->name('file.upload');


// Route::get('getfile',function(){
//     return view('upload');
// });
Route::view('getfile','upload');

Route::post('fileupload',[StudentsController::class,'upload'])->name('file.upload');



//route to fetch all users
Route::get('dnine',[NineController::class,'index']);

//registraion form route
route::view('registernine','registernine');

//store user
Route::post('sendnine',[NineController::class,'store']);

// show edit form
Route::get('edit/{nine}',[NineController::class,'edit']);

//update users record
Route::put('update/{nine}',[NineController::class,'update']);

//delete user record
Route::get('delete/{nine}',[NineController::class,'destroy']);









