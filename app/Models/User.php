<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function videos(){

        return $this->hasMany(Video::class,'user_id','id');
    }


    public function followers(){
        return $this->hasMany(Follower::class,'following','id');
    }

    // public function followerDetail(){
    //     return $this->belongsTo(User::class);
    // }

    public function following(){
        return $this->hasMany(Follower::class,'follow','id');
    }

    public function profile(){

        return $this->hasOne(Profile::class,'user_id','id');
    }

    public function notification($id){


        $notifications = DB::table('notifications')->where('notifiable_id',$id)->get();
        return $notifications; 

    }




}
