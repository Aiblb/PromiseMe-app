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
Route::get('/register', function () {
    return view('register');
})->middleware('guest');

Route::post('/register', function () {
    $data = request()->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'username' => 'required|min:5|max:255|unique:users,username',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|min:5',
        'avatar' => 'required'
    ]);

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


Route::get('/logout', function () {
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
    if (auth()->attempt($data)) {
        session()->regenerate();
        //Send them to Promises page
        return redirect('/promises')->with('success', 'You have been logged in successfully');
    } else {
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
    $promise['public'] = request()->boolean(key: 'public');
    $promise['user_id'] = Auth::id();
    $promise['status'] = false;

    //Creation of promise
    $newPromise = Promise::create($promise);

    if (request()->hasFile('image')) {
        request()->file('image')->storeAs('promiseImg', "$newPromise->id.png", 'public');
    }

    return redirect('/promises')->with('success', 'Your promise has been saved successfully');
})->middleware('auth');



//Show account info
Route::get('/account', function () {
    return view('account', [
        'account' => Promise::all()->where('user_id', "=", Auth::id())->sortByDesc('id'),
        'count' => Promise::all()->count(),
    ]);
})->middleware('auth');



//Show account info
Route::get('/planner', function () {
    return view('planner', [
        'promises' => Promise::all()->where('user_id', "=", Auth::id()),
        'tasks' => Auth::user()->tasks, //Using eloquent to access
        'promises' => Auth::user()->promises
    ]);
});


//Create and store tasks
Route::post('/planner', function () {
    $task = request()->validate([
        'title' => 'required',
        'description' => 'required',
        'deadline' => 'required',
        'promise_id' => 'required'
    ]);

    //Default values

    $task['status'] = false;

    //Creation of tasks
    Task::create($task);
    return redirect('/planner')->with('success', 'Your task has been saved successfully');
})->middleware('auth');

//Change progress bar as it is clicked
Route::get('/taskStatus/{task}', function(Task $task){
    $task->status = !$task->status;
    $task->save();

    return redirect("/planner#CBTask$task->id");
})->middleware('auth');

Route::get('/planner/tasks', function() {
    return Auth::user()->tasks->makeHidden(['id', 'promise_id', 'status', 'deadline', 'created_at', 'updated_at', 'laravel_through_key'])->makeVisible('start')->toJson();
})->middleware('auth');
