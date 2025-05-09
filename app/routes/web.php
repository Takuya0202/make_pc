<?php

use App\Http\Controllers\Admin\DashbordController;
use App\Http\Controllers\Admin\PartController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\application\DetailController;
use App\Http\Controllers\Application\HomeController;
use App\Http\Controllers\Application\PcListController;
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
    Route::get('home/search',[HomeController::class,'search'])->name('app.home.search');
    Route::post('/logout',[LogoutController::class,'logout'])->name('auth.logout');
    // パーツ詳細ページ
    Route::get('/detail/{part_id}',[DetailController::class,'showDetailView'])->name('app.detail')->whereNumber('part_id');
    //商品レビューページ
    Route::get('/review/{part_id}',[ReviewController::class,'showReviewView'])->name('app.review')->whereNumber('part_id');
    Route::post('/review/{part_id}',[ReviewController::class,'review']);
    // pcListページ
    Route::get('/list',[PcListController::class,'showPcListsView'])->name('app.lists');
    Route::get('/list/{pc_list_id}',[PcListController::class,'showPcListView'])->name('app.list')->whereNumber('pc_list_id');
    Route::post('list/create',[PcListController::class,'createList'])->name('app.list.create');
    Route::post('/list/add',[PcListController::class,'addPartToList'])->name('app.list.add');
    Route::put('/list/update',[PcListController::class,'updateQuantity'])->name('app.list.update');
    Route::delete('/list/delete',[PcListController::class,'deletePartFromList'])->name('app.list.delete');
});

// 管理者ページ
Route::middleware('auth','admin')->prefix('admin')->group(function(){
    // ダッシュボード
    Route::get('/',[DashbordController::class,'showDashbordView'])->name('admin.home');
    // パーツ管理
    Route::get('/parts',[PartController::class,'showPartsView'])->name('admin.parts');
    Route::get('/parts/{part_id}',[PartController::class,'showPartView'])->name('admin.part')->whereNumber('part_id');
    // パーツ作成
    Route::get('/part/create',[PartController::class,'createPartView'])->name('admin.part.create');
    Route::post('/part',[PartController::class,'create'])->name('admin.part.store');
    // パーツ編集
    Route::get('/part/{part_id}/edit',[PartController::class,'editPartView'])->name('admin.part.edit')->whereNumber('part_id');
    Route::put('/part/{part_id}',[PartController::class,'update'])->name('admin.part.update');
    // パーツ削除
    Route::get('/part/{part_id}/delete',[PartController::class,'deletePartView'])->name('admin.part.delete');
    Route::delete('/part/{part_id}',[PartController::class,'delete'])->name('admin.part.destroy');
    // レビュー管理 一覧、パーツごと、ユーザーごと、詳細
    Route::get('/reviews',[AdminReviewController::class,'showReviewsView'])->name('admin.reviews.index');
    Route::get('/reviews/{part_id}/part',[AdminReviewController::class,'showPartReviewView'])->name('admin.reviews.part')->whereNumber('part_id');
    Route::get('/reviews/{user_id}/user',[AdminReviewController::class,'showUserReviewView'])->name('admin.reviews.user')->whereNumber('user_id');
    Route::get('/reviews/{review_id}/show',[AdminReviewController::class,'showReviewView'])->name('admin.reviews.show')->whereNumber('review_id');
    Route::get('/reviews/{review_id}/delete',[AdminReviewController::class,'showDeleteView'])->name('admin.reviews.delete')->whereNumber('review_id');
    Route::delete('/reviews/{review_id}',[AdminReviewController::class,'delete'])->name('admin.reviews.destroy');
    // ユーザー管理
    Route::get('/users',[AdminUserController::class,'showUsersView'])->name('admin.users.index');
    Route::get('/users/{user_id}/show',[AdminUserController::class,'showUserView'])->name('admin.users.show')->whereNumber('user_id');

});
