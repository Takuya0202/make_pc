<?php

use App\Http\Controllers\Application\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('auth')->group(function(){
    Route::get('/register',[RegisterController::class,'showRegisterView'])->name('auth.register');
    Route::post('/register',[RegisterController::class,'register']);
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('auth.login');
    Route::post('/login',[LoginController::class,'login']);
});

Route::middleware('auth')->prefix('app')->group(function(){
    Route::get('home',[HomeController::class,'showHomeView'])->name('app.home');
    Route::post('/logout',[LogoutController::class,'logout'])->name('auth.logout');
});
