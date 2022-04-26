<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function profile_image(){

        $avatar =  Profile::where('user_id',Auth::user()->id)->first();
  
        return $avatar;
    }
}
