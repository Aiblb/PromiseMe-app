<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Promise;
use App\Models\Task;
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

    $data['avatar'] = 1;

    //Creation
    $user = User::create($data);
    //Loggin In
    auth()->login($user);
    //Send them to Promises page
    return redirect('/promises')->with('success', 'Your account has been created and you have been logged in');
});


//Show all promises
Route::get('/promises', function () {
    return view('promises', [
        'promises' => Promise::all()->where('public', '=', '1')->sortByDesc('id')
    ]);
})->middleware('auth');


Route::get('/logout', function(){
    auth()->logout();
    //Send them to Promises page
    return redirect('/')->with('success', 'You have been logged out successfully');
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
        //Send them to Promises page
    return redirect('/promises')->with('success', 'You have been logged in successfully');
    }
    else{
        return back()->withInput()->withErrors(['username' => 'The username provided could not be verified']);
    }
})->middleware('guest');


//Add new promise
Route::get('/promiseform', function () {
    return view('promiseform');
})->middleware('auth');


//Create promise
Route::post('/promiseform', function () {
    $promise = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'public' => 'required'
    ]);

    //Default values
    $promise['public']= request()->boolean(key: 'public');
    $promise['user_id']= Auth::id();
    $promise['status'] = false;

    //Cretion of promise
    Promise::create($promise);
    return redirect('/promises')->with('success', 'Your promise has been saved successfully');
})->middleware('auth');



//Show account info
Route::get('/account', function () {
    return view('account', [
    'account' => Promise::all()->where('user_id', "=", auth()->id()),
    'count' => Promise::all()->count(),
    ]);
})->middleware('auth');



//Planner test script
Route::get('/planner', function(){
    return view('planner', [
        'promises' => Promise::all()->where('user_id', "=", auth()->id()),
        'tasks' => Task::all(), //WAHT ->where('promise->tasks->user_id', '=', auth()->id())
        response()->json(Task::all()),
    ]);
});



Route::post('/planner', function(){
    $task = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'deadline' => 'required',
        'promise_id' => 'required'
    ]);

    //Default values

    $task['status'] = false;

    //Cretion of promise
    Task::create($task);
    return redirect('/planner')->with('success', 'Your task has been saved successfully');
});
