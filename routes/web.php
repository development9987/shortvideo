<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('dashboard/dashboard');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Front Route
Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class,'index'])->name('index');


//Dashboard Routes
Route::prefix('dashboard')->group(function(){
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
});

Route::post('/search/video',[App\Http\Controllers\VideoController::class,'searchVideo'])->name('search.video');
Route::middleware('auth')->group(function(){
    Route::get('/upload',[App\Http\Controllers\VideoController::class,'upload'])->name('upload.video');
    
    Route::post('/upload/video',[App\Http\Controllers\VideoController::class,'upload_video'])->name('store.video');
    Route::post('/update/video/{id}',[App\Http\Controllers\VideoController::class,'updateVideo'])->name('update.video');
    Route::post('/delete/video/{id}',[App\Http\Controllers\VideoController::class,'deleteVideo'])->name('delete.video');
    Route::get('/edit/video/{id}',[App\Http\Controllers\VideoController::class,'editVideo'])->name('edit.video');

    Route::post('follow/{id}',[App\Http\Controllers\FollowerController::class,'follow'])->name('follow');
    Route::post('like/{id}',[App\Http\Controllers\LikedMessageController::class,'likeVideo'])->name('like');
    Route::get('setting/{id}',[App\Http\Controllers\ProfileController::class,'profile'])->name('setting');
    Route::post('setting/profile',[App\Http\Controllers\ProfileController::class,'profileSetting'])->name('setting.profile');
    Route::post('change/password/{id}',[App\Http\Controllers\ProfileController::class,'updatePassword'])->name('setting.password');
    Route::get('/user/videos/{id}',[App\Http\Controllers\VideoController::class,'usersVideos'])->name('users.videos');
    Route::get('/user/followers/{id}',[App\Http\Controllers\FollowerController::class,'usersFollowers'])->name('users.follower');
    Route::get('/user/followings/{id}',[App\Http\Controllers\FollowerController::class,'usersFollowings'])->name('users.following');
    //Video Commments

    Route::post('/post/comment',[App\Http\Controllers\CommentController::class,'store'])->name('store.comment');
    Route::post('reply/{id}',[App\Http\Controllers\CommentController::class,'reply'])->name('store.reply');
    Route::post('theme',[App\Http\Controllers\Frontend\FrontendController::class,'changeTheme'])->name('change.theme');
    Route::get('create/gallery',[App\Http\Controllers\DashboardController::class,'createGallery'])->name('create.gallery');
    Route::post('upload/gallery',[App\Http\Controllers\DashboardController::class,'uploadGallery'])->name('upload.gallery');
    Route::post('image/delete',[App\Http\Controllers\DashboardController::class,'fileDestroy'])->name('remove.image');
   
});
Route::prefix('admin')->middleware('auth')->group(function(){
    
    Route::get('/videos',[App\Http\Controllers\DashboardController::class,'videos'])->name('admin.videos');
    Route::get('/tags',[App\Http\Controllers\DashboardController::class,'tags'])->name('admin.tags');
    Route::get('/users',[App\Http\Controllers\DashboardController::class,'users'])->name('admin.users');
    Route::get('/show/users',[App\Http\Controllers\DashboardController::class,'showUsers'])->name('admin.show.users');
    Route::get('/show/{id}',[App\Http\Controllers\DashboardController::class,'showVideo'])->name('admin.show');
    Route::get('/delete/{id}',[App\Http\Controllers\DashboardController::class,'deleteVideo'])->name('admin.delete');
    Route::get('/single/video/{id}',[App\Http\Controllers\DashboardController::class,'single_video'])->name('single.video');
    Route::get('/show/user/{id}',[App\Http\Controllers\DashboardController::class,'show_user'])->name('show.user');
    Route::get('/delete/user/{id}',[App\Http\Controllers\DashboardController::class,'delete_user'])->name('delete.user');
    
    Route::get('/upload/request',[App\Http\Controllers\VideoController::class,'upload_request'])->name('upload.request');
    Route::get('/reject/{id}',[App\Http\Controllers\VideoController::class,'reject_video'])->name('reject.video');
    Route::get('/approve/{id}',[App\Http\Controllers\VideoController::class,'approve_video'])->name('approve.video');
 
});
Route::get('/video/{tag}',[App\Http\Controllers\VideoController::class,'tags_videos'])->name('tag.video');
Route::get('profile/{id}',[App\Http\Controllers\DashboardController::class,'profile'])->name('user.profile');
Route::get('filter',[App\Http\Controllers\VideoController::class,'filter'])->name('video.filter');
Route::get('mobile/view/{id}',[App\Http\Controllers\VideoController::class,'mobileView'])->name('mobile.view');
