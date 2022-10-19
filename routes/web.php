<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Promise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Validation;
use Illuminate\Validation\Rule;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Registration routes
Route::get('/register', function (){
    return view('register');
})->middleware('guest');

Route::post('/register', function (){
    $data = request()->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required|min:5|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:5'
    ]);

    //Creation
    $user = User::create($data);
    //Loggin In
    auth()->login($user);
    //Send them to Promises page
    return redirect('/promises')->with('success', 'Your account has been created and you have been logged in');
});

//Create promise route
Route::post('/promiseform', function () {
    $promise = request()->validate([
        'title' => 'required',
        'description' => 'required'
    ]);

    //Default values
    $promise['user_id']= Auth::id();
    $promise['public'] = true;
    $promise['status'] = false;

    //Cretion of promise
    Promise::create($promise);
    return redirect('/promises')->with('success', 'Your promise has been saved successfully');
})->middleware('auth');


Route::get('/promises', function () {
    return view('promises', [
        'promises' => Promise::all()->where('public', '=', '1')->sortByDesc('id')
    ]);
})->middleware('auth');

Route::get('/logout', function(){
    auth()->logout();
    return redirect('/');
})->middleware('auth');

//Log In

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::post('/login', function () {
    $data = request()->validate([
        'username' => 'exists:users,username',
        'password' => 'required'
    ]);

    //Attemps logs you in and checks password
    if(auth()->attempt($data)){
        session()->regenerate();
        return redirect('/');
    }
    else{
        return back()->withInput()->withErrors(['username' => 'The username provided could not be verified']);
    }


})->middleware('guest');

Route::get('/promiseform', function () {
    return view('promiseform');
})->middleware('auth');

Route::get('/account', function () {
    return view('account');
})->middleware('auth');


Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);

});
