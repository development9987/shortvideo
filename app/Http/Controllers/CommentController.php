<?php

namespace App\Http\Controllers;

use Notification;
use App\Models\User;
use App\Models\Video;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CommentNotification;

class CommentController extends Controller
{
    public function store(Request $request)
    {
    
    	$request->validate([
            'comment'=>'required',
        ]);


        $video = Video::where('id',$request->video_id)->pluck('user_id');
        $user = User::where('id',$video)->first();
        $auth = Auth::user();
   
        // $input = $request->all();
        $input['video_id'] = $request->video_id;
        $input['body'] = $request->comment;
    
        $input['user_id'] = auth()->user()->id;
 
        $comment = Comment::create($input);
        

        Notification::send($user, new CommentNotification($auth));
        return response()->json($comment);
    }

    public function reply(Request $request)
    {
    	$request->validate([
            'body'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Comment::create($input);
   
        return back();
    }
}
