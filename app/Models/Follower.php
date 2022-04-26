<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follower extends Model
{
    use HasFactory,  Notifiable;


    public function follow_status($id){


        $exist = Follower::where([['follow','=',Auth::user()->id],['following','=',$id]])->exists();
        if($exist){

            return 'Following';

        }else{

            return 'FolloW';

        }
    }


    
}
