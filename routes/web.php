<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Promise;
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
});

Route::post('/register', function (){
    $data = request()->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => ['required', 'min:5', 'max:255', Rule::unique('users', 'username')],
        'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
        'password' => 'required|min:5'
    ]);

    //Creation
    $user = User::create($data);
    //LogginIn
    auth()->login($user);
    //Send them to Promises page
    return redirect('/promises');
});

Route::get('/promises', function () {
    return view('promises', [
        'promises' => Promise::all()->where('public', '=', '1')->sortByDesc('id')
    ]);
});

Route::post('/logout', function(){

    auth()->logout();
    return redirect('/');
});

//Log In
Route::get('/register', function (){
    return view('register');
});

//Register
Route::post('/register', function (){
    $data = request()->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => ['required', 'min:5', 'max:255', Rule::unique('users', 'username')],
        'password' => 'required'
    ]);


Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);

});

    //session()->flash('success', 'Your account has been created and you have been logged in.');


