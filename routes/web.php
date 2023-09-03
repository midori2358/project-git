<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController; // 追記
use App\Http\Controllers\ProjectsController; //追記
use App\Http\Controllers\UserFollowController;  // 追記
use App\Http\Controllers\FavoritesController;  // 追記
use App\Http\Controllers\ContactController;  // 追記
use App\Http\Controllers\ScheduleController;  // 追記
use App\Http\Controllers\MyprofileController;

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

Route::get('/dashboard',[ProjectsController::class, 'index1'])->middleware(['auth'])->name('dashboard');


//ユーザー情報の編集
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
    
     //myプロフィール用
         Route::resource('myprofile', MyprofileController::class);
    //MyprofileControllerから下記すべての処理を引っ張ってくる
        /*
        Route::get('myprofile/{id}', [MyprofileController::class, 'show']);
        Route::post('myprofile', [MyprofileController::class, 'store']);
        Route::put('myprofile/{id}', [MyprofileController::class, 'update']);
        Route::get('myprofile', [MyprofileController::class, 'index'])->name('myprofile.index');
        Route::get('myprofile/create', [MyprofileController::class, 'create'])->name('myprofile.create');
        Route::get('myprofile/{id}/edit', [MyprofileController::class, 'edit'])->name('myprofile.edit');
        */
        
    
    
    Route::resource('users', UsersController::class, ['only' => ['index', 'show']]);     
    Route::resource('projects', ProjectsController::class, ['only' => ['store', 'destroy','create']]);
    
     //投稿フォーム
     //入力ページ
    //Route::get('projects/create', [ProjectsController::class,'create'])->name('projects.create');
    
    Route::group(['prefix' => 'projects/{id}'], function () {                                             // 追加
        Route::post('favorites', [FavoritesController::class, 'store'])->name('favorites.favorite');        // 追加
        Route::delete('unfavorite', [FavoritesController::class, 'destroy'])->name('favorites.unfavorite'); // 追加
        Route::get('favoriteusers', [ProjectsController::class, 'favorite_users'])->name('projects.favoriteusers');            // 追加
    });     
    
    Route::get('/calendar', function () {return view('calendar');});// カレンダー表示
    // イベント登録処理
    Route::post('/scheduleadd', [ScheduleController::class, 'scheduleAdd'])->name('scheduleadd');
    // イベント取得処理
    Route::post('/scheduleget', [ScheduleController::class, 'scheduleGet'])->name('scheduleget');
   
   
    //Route::get('users', [UsersController::class, 'usersearch'])->name('users.usersearch');   
   
});

//問い合わせフォーム
    //入力ページ
    Route::get('/contact', [ContactController::class,'index'])->name('contact.index');
    //確認ページ
    Route::post('/contact/confirm', [ContactController::class,'confirm'])->name('contact.confirm');
    //送信完了ページ
    Route::post('/contact/thanks', [ContactController::class,'send'])->name('contact.send');

 
    