<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LikedMessage extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function liked($id){

        $like = LikedMessage::where([['user_id','=',Auth::user()->id],['video_id','=',$id],['status','=','1']])->exists();

        if($like){

            return 'favorite';

        }else if(LikedMessage::where([['user_id','=',Auth::user()->id],['video_id','=',$id],['status','=','0']])->exists()){
            return 'favorite_border';
 
        }else{
            return 'favorite_border';

        }
    }



    public function countLike($id){

        $count = LikedMessage::where('video_id',$id)->count();

        return $count;


    }
}
