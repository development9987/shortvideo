<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\Video;
use App\Models\LikedMessage;
use Illuminate\Http\Request;
use App\Notifications\LikeVideo;
use App\Notifications\DisLikeVideo;
use Illuminate\Support\Facades\Auth;


class LikedMessageController extends Controller
{
    public function likeVideo(Request $request)
    {

        $id = Auth::user()->id;
        $liked_by = Auth::user();
        $user_id = Video::where('id',$request->video_id)->pluck('user_id');
        $user = User::where('id',$user_id)->first();

        $like = new LikedMessage();
        $exist = LikedMessage::where([['user_id','=',$id],['video_id','=',$request->video_id]])->exists();
        $liked = LikedMessage::where([['user_id','=',$id],['video_id','=',$request->video_id],['status','=','1']])->exists();
        $disliked = LikedMessage::where([['user_id','=',$id],['video_id','=',$request->video_id],['status','=','0']])->exists();
        if(!$exist){

            $like = LikedMessage::create([
                    'user_id' => $id,
                    'video_id' => $request->video_id,
                    'status' => '1'
            ]);
          
            Notification::send($user, new LikeVideo($liked_by));
                return response()->json('Liked');
    
         


        }else if($liked){


           $like = LikedMessage::where([['user_id','=',$id],['video_id','=',$request->video_id]])->first();
           $like->status = '0';
           $like->update();
           Notification::send($user, new DisLikeVideo($liked_by));
           return response()->json('unLiked');

        }else if($disliked){

            
           $like = LikedMessage::where([['user_id','=',$id],['video_id','=',$request->video_id]])->first();
           $like->status = '1';
           $like->update();

           return response()->json('Liked');


        }

   


    }
}
