<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $users = User::with('followers','profile')->where('role','user')->get();
        $comments = Comment::with('user','replies')->get(); 
        $users_count = User::get()->count();
        $videos_count = Video::get()->count();
        $pendding_videos = Video::where('status','pendding')->get()->count();
        $approved_videos = Video::where('status','approved')->get()->count();
        // $user = User::with('profile')->where('id',Auth::user()->id)->first();
        // $trendingUsers = User::with('followers')->where()-> 
       
        View::share(['user' => $users, 'users_count' => $users_count, 'videos_count' => $videos_count, 'pendding_videos' => $pendding_videos, 'approved_videos' => $approved_videos]);
    }
}
