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
    return view('login');
});

Route::get('/users', function () {
    return view('users', [
        'users' => User::all()
    ]);

});

Route::get('/promises', function () {
    return view('promises', [
        'promises' => Promise::all()->where('public', '=', '1')->sortByDesc('id')
    ]);

});


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

    //create

    $user = User::create($data);

    auth()->login($user);

    session()->flash('success', 'Your account has been created and you have been logged in.');

});

