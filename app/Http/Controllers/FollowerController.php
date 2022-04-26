<?php

namespace App\Http\Controllers;

use Notification; 
use App\Models\User;
use App\Models\Follower;
use Illuminate\Http\Request;
use App\Notifications\FollowUser;
use Illuminate\Support\Facades\DB;
use App\Notifications\UnFollowUser;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{

    public function follow(Request $request){

    $follow = new Follower;
    $exist =  Follower::where([['follow','=',Auth::user()->id],['following','=',$request->id]])->exists();
    $user = Auth::user();
    $follower = User::where('id',$request->id)->first();
    if($exist){
        $delete =  Follower::where([['follow','=',Auth::user()->id],['following','=',$request->id]])->delete();
        if($delete){

            Notification::send($follower,new UnFollowUser($user));
            return response()->json('Following');
             
        }else{
            return response()->json('Follow');
        }
      
    }else{
        $follow->follow = Auth::user()->id;
        $follow->following = $request->id;
        if($follow->save()){
            Notification::send($follower, new FollowUser($user));
           return response()->json('Following');
   
   
        }else{
           return response()->json('Follow');
   
        }

    }
 
        
    }


    public function usersFollowers(){

        $followers = DB::table('followers')
                     ->select('*')
                     ->join('users','users.id','followers.follow')
                     ->leftJoin('profiles','profiles.user_id','followers.follow')
                     ->where('followers.following',Auth::user()->id)
                     ->get();
    
       

        return view('dashboard.user.follower',compact('followers'));
    }

    public function usersFollowings(){

        $followings = DB::table('followers')
        ->select('*')
        ->join('users','users.id','followers.following')
        ->leftJoin('profiles','profiles.user_id','followers.following')
        ->where('followers.follow',Auth::user()->id)
        ->get();
    

        return view('dashboard.user.following',compact('followings'));
    }

}
