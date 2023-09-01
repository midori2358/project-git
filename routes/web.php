<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController; // 追記
use App\Http\Controllers\ProjectsController; //追記
use App\Http\Controllers\UserFollowController;  // 追記
use App\Http\Controllers\FavoritesController;  // 追記
use App\Http\Controllers\ContactController;  // 追記

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

Route::get('/', [ProjectsController::class, 'index']);

//Route::get('/dashboard1', [UsersController::class, 'show1']);//プロジェクト全件取得

Route::get('/dashboard',[ProjectsController::class, 'index'])->middleware(['auth'])->name('dashboard');

// ユーザー情報の編集
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function () {                 
    Route::group(['prefix' => 'users/{id}'], function () {                                          // 追記
        Route::post('follow', [UserFollowController::class, 'store'])->name('user.follow');         // 追記
        Route::delete('unfollow', [UserFollowController::class, 'destroy'])->name('user.unfollow'); // 追記
        Route::get('followings', [UsersController::class, 'followings'])->name('users.followings'); // 追記
        Route::get('followers', [UsersController::class, 'followers'])->name('users.followers');    // 追記
        Route::get('favorites', [UsersController::class, 'favorites'])->name('users.favorites');            // 追加
    });                                                 
    
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);     
    Route::resource('projects', ProjectsController::class, ['only' => ['store', 'destroy']]);
    
    Route::group(['prefix' => 'projects/{id}'], function () {                                             // 追加
        Route::post('favorites', [FavoritesController::class, 'store'])->name('favorites.favorite');        // 追加
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('favorites.unfavorite'); // 追加
    });     
    
    Route::get('/calendar', function () {return view('calendar');});// カレンダー追加
    // イベント登録処理
    Route::post('/schedule-add', [ScheduleController::class, 'scheduleAdd'])->name('schedule-add');
    // イベント取得処理
    Route::post('/schedule-get', [ScheduleController::class, 'scheduleGet'])->name('schedule-get');
    
    
    //問い合わせフォーム
    //入力ページ
    Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
    //確認ページ
    Route::post('/contact/confirm', [ContactController::class,'confirm'])->name('contact.confirm');
    //送信完了ページ
    Route::post('/contact/thanks', [ContactController::class,'send'])->name('contact.send');
    
    //投稿フォーム
     //入力ページ
   // Route::get('/project', [ProjectsController::class,'formview'])->name('projects.formview');
});
