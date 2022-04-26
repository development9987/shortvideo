<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    use SoftDeletes;
   
    protected $dates = ['deleted_at'];
    protected $fillable = ['user_id', 'video_id', 'parent_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function countComment($id)
    {
         $count = Comment::where('video_id',$id)->count();
         return $count;
    }
   
    /**
     * The has Many Relationship
     *
     * @var array
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
