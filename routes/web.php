<?php

use App\Http\Controllers\UserController;
use App\Http\Livewire\Admin\AddNewUser;
use App\Http\Livewire\Admin\CreateUsers;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
});


Route::get('/sidebar', function () {
    return view('sidebar');
});


Route::post('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/login/process', [UserController::class, 'loginProcess'])->name('login-process');

// only autehnticated user
Route::middleware('auth', 'user')->group(function () {

    Route::get('/user', function () {
        return view('user_pages.profile');
    })->name('user.profile');
});

//no account needed
Route::middleware('user')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home')->middleware('user');
});

//admin routes
Route::middleware('auth', 'admin')->prefix('admin')->group(function () {
    Route::get('/component', AddNewUser::class);
    // Route::post('list', AddNewUser::class)->name('admin.users');

    //list of users and adding process
    Route::get('/list', [UserController::class, 'studentList'])->name('admin.users');
    // Route::post('/list/add-user', [UserController::class, 'addNewUser'])->name('addNewUser');

    //designing
    Route::get('/home', function () {
        return view('admin.pages.index')->with('title', 'Home');
    })->name('admin.home');
});



Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/signup', [UserController::class, 'register'])->name('register');
});





Route::get('test', CreateUsers::class);