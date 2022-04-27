<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard.dashboard');
    }

    public function showVideo($id){

        $video = Video::with('user')->where('id',$id)->first();
        $videotags = (explode(" ",$video->tag));
        return view('dashboard.video',compact('video','videotags'));

    }
    public function deleteVideo($id){



        $delete = Video::find($id)->delete();

        if($delete){
            return back()->with('message','Video Delete');
        }else{

            return back()->with('message','Something Went Wrong');
        }
    }


    public function showUsers(){

       $user = User::where('user.followers')->first();
       return view('dashboard.user');

    }

    public function profile($id){

        $profile = User::with('videos')->with('followers','following')->where('id',$id)->first();

        $videos = $profile->videos->count();
        $followers = $profile->followers->count();
        $following = $profile->following->count();
        return view('dashboard.profile',compact('profile','videos','followers','following'));
    }

    public function  videos(){
        $videos = Video::where('status','approved')->with('user')->paginate(8);
        return view('dashboard.videos',compact('videos'));
    }

    public function tags(){

        $tags = Video::where('status','approved')->pluck('tags')->toArray();
        return view('dashboard.tags',compact('tags'));
    }

    public function users(){
        $users = User::with('followers','profile')->where('role','user')->paginate(8);
        return view('dashboard.users',compact('users'));
    }

    public function single_video($id){

        $video = Video::whereId($id)->first();
        return view('dashboard.video');

    }


    public function delete_user($id){

        $user = User::where('id',$id)->first();
        if($user->delete()){
             Video::where('user_id',$id)->delete();
            return back()->with('message','User Deleted');

        }else{
            return back()->with('message'.'Failed To Delete User');
        }

    }

    public function show_user($id){

        $user = User::where('id',$id)->with('profile','followers','videos')->first();
        return view('dashboard.user',compact('user'));


    }


    public function createGallery(){

        $id = Auth::user()->id;
        $images = ImageUpload::where('user_id',$id)->get();


        return view('dashboard.user.image-upload',compact('images'));
    }


    public function uploadGallery(Request $request){

        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('images'),$imageName);

        $imageUpload = new ImageUpload();
        $imageUpload->filename = $imageName;
        $imageUpload->user_id = Auth::user()->id;
        $imageUpload->save();
        return response()->json(['success'=>$imageName]);
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');

        ImageUpload::where('filename',$filename)->delete();
        $path=public_path().'/images/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }




}
