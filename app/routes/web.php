<?php

use App\Http\Controllers\application\DetailController;
use App\Http\Controllers\Application\HomeController;
use App\Http\Controllers\Application\ReviewController;
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
    // パーツ一覧ページ。ログインしたらここに来る
    Route::get('home',[HomeController::class,'showHomeView'])->name('app.home');
    Route::post('/logout',[LogoutController::class,'logout'])->name('auth.logout');
    // パーツ詳細ページ
    Route::get('/detail/{id}',[DetailController::class,'showDetailView'])->name('app.detail')->whereNumber('id');
    //商品レビューページ
    Route::get('/review/{id}',[ReviewController::class,'showReviewView'])->name('app.review')->whereNumber('id');
    Route::post('/review/{id}',[ReviewController::class,'review']);
});
