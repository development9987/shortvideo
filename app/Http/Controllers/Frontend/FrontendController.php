<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
      public function index(){

     
        
       

        $videos = Video::where('status','=','approved')->with('user.followers')->with('comments.user')->with('user.profile')->latest()->get();
        
        $tags = Video::pluck('tags')->take(10)->toArray();
        foreach($tags as $key => $tag){
          $videotags[$key] = (explode(" ",$tag));

        }


        return view('frontend.index',compact('videos','tags','videotags'));
      }

      

      public function changeTheme(Request $request){
     

 

        $user = User::where('id',Auth::user()->id)->first();
     
        if($user->theme == 'dark')
        {
          $user->theme = 'light';
          $user->update();

        }else if($user->theme == 'light'){
          $user->theme = 'dark';
          $user->update();
        }
        
       

          return response()->json('updated');
 
        
    

      }


      
}
