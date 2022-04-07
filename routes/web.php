<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/create-user', function () {
    return view('add-user');
});

Route::get('/login', function () {
    return view('login');
})->middleware('guest')->name('login');


Route::post('/login-user', [LoginController::class, "logCheck"]);

Route::post('/logout-user', [LoginController::class, "logOut"]);



Route::post("/add-user", [UserController::class, 'addUser'])->name("add-user");




Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [UserController::class, 'getuser'])->name('home');
    // Route::get("/user",[UserController::class, 'getuser'])->name("user-list");

    Route::post("/update-user", [UserController::class, 'updateUser'])->name("update-user");
    Route::post("/delete-user", [UserController::class, 'deleteUser'])->name("delete-user");
});
