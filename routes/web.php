<?php

use App\Http\Controllers\UserController;
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
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/sidebar', function () {
    return view('sidebar');
});


Route::post('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::post('/login/process', [UserController::class, 'loginProcess'])->name('login-process');

// only autehnticated user level1
Route::middleware('auth')->group(function () {
    // Route::get('/user/{id}', [UserController::class, 'viewProfile'])->name('user.profile');

    Route::get('/user', function () {
        return view('user_pages.profile');
    })->name('user.profile');

});

//admin view
Route::get('/list', function () {
    return view('admin_pages.user-list');
});



Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::get('/signup', [UserController::class, 'register'])->name('register');
});