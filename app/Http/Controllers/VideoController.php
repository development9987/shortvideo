<?php

namespace App\Http\Controllers;

use Thumbnail ;
use Notification;
use App\Models\User;
use App\Models\Video;
use App\Models\Follower;
use Illuminate\Http\Request;
use App\Notifications\FollowUser;
use App\Notifications\VideoUpload;
use Illuminate\Support\Facades\DB;
use App\Notifications\VideoCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;


class VideoController extends Controller
{
    public function upload(){
        return view('dashboard.upload');
    }
    

    public function upload_video(Request $request){
     
        $data=$request->all();
        $admin = User::where('role','admin')->first(); 
        $u = Auth::user();
        $followers = User::where('id',Auth::user()->id)->with('followers')->first();
        $videoupload = new Video;
        $rules=[
          'file' =>'mimes:mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040|required'
        ];
       $validator = Validator($data,$rules);

       if ($validator->fails()){
           return redirect()
                       ->back()
                       ->withErrors($validator)
                       ->withInput();
       }else{
         
                  $video=$data['file']; 
                  // $input = time().".".$video->getClientOriginalExtension();
                   $thumbnail = "/thumbnails/".time().".png";
                  // $destinationPath = 'uploads/videos';
                  // $upload_status = $video->move($destinationPath, $input);
                  $path = $request->file('file')->store("public/videos");
                  $video_path = str_replace('public','',$path);
                 
                    FFMpeg::fromDisk('local')
                    ->open($path)
                    ->getFrameFromSeconds(1)
                    ->export()
                    ->toDisk('local')
                    ->save("public/thumbnails/".time().".png"); 

                      $user['video_url']       =  $video_path;
                      $user['user_id']     = Auth::user()->id;
                      $user['title']       = $data['title'];
                      $user['tags']        = json_encode($data['tags']);
                      $user['description']       = $data['description'];
                      $user['thumbnail'] = $thumbnail;
                      $user['status'] = 'pendding';
                      
                   
                     
                    //DB::table('user_videos')->insert($user);
                    $videodetails = $videoupload->create($user);
                    // Notification::send($admin, new VideoUpload($videodetails));
                    foreach ($followers->followers as $follower) {
                      
                         
                         $follower->notify(new VideoUpload($u));
                  }
                  
                 
                    return redirect()->back()->with('upload_success','Video Uploaded Succesfully');
              }

    }
    public function tags_videos($tag){
      
      $videos = Video::with('user')->whereRaw('json_contains(tags, \'["' . $tag . '"]\')')->get();
      $tags = Video::pluck('tags');
      return view('frontend.tag_videos',compact('videos','tags'));

    }


    public function editVideo($id){

      $video = Video::where('id',$id)->first();

      return view('dashboard.video.edit',compact('video'));
  

    }

    public function updateVideo(Request $request){

      $video = Video::where('id',$request->id)->first();
     
    
      $rules=[
        'file' =>'mimes:mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040'
      ];
      $data = $request->all();
     $validator = Validator($data,$rules);

     if ($validator->fails()){
         return redirect()
                     ->back()
                     ->withErrors($validator)
                     ->withInput();
     }else{


      if($request->hasFile('file')){
        $video=$data['file']; 
        // $input = time().".".$video->getClientOriginalExtension();
         $thumbnail = "/thumbnails/".time().".png";
        // $destinationPath = 'uploads/videos';
        // $upload_status = $video->move($destinationPath, $input);
        $path = $request->file('file')->store("public/videos");
        $video_path = str_replace('public','',$path);
       
          FFMpeg::fromDisk('local')
          ->open($path)
          ->getFrameFromSeconds(1)
          ->export()
          ->toDisk('local')
          ->save("public/thumbnails/".time().".png"); 

      }else{

        $video_path = $request->old_file;
        $thumbnail = $request->thumbnail;

      }
       
             

                    $user['video_url']       =  $video_path;
                    $user['user_id']     = Auth::user()->id;
                    $user['title']       = $data['title'];
                    $user['tags']        = json_encode($data['tags']);
                    $user['description']       = $data['description'];
                    $user['thumbnail'] = $thumbnail;
                 
                   
                  //   DB::table('user_videos')->insert($user);
                    $video->update($user);
                
                    return redirect()->back()->with('upload_success','Video Updated Succesfully');
            }
  

    } 
    
    
    public function searchVideo(Request $request){

      $str = $request->str;
      $videos = Video::with('user.followers')->where('title', 'like', "%{$str}%")->orWhere('description','like',"%{$str}%")->orWhere('tags', 'like', "%{$str}%")->get();
   
      // return view('frontend.video.search',compact('videos'));

      $tags = Video::pluck('tags')->take(10)->toArray();
      foreach($tags as $key => $tag){
        $videotags[$key] = (explode(" ",$tag));

      }
      return view('frontend.index',compact('videos','tags','videotags'));

    }

    public function search(Request $request){

      $query = $request->search;
      
      $videos = DB::table('videos');        
  
     if($query){
        $videos = $videos->where('name', 'LIKE', "%$query%");
      }
 
  
      $videos->get();
      return view('')->with('users', $users);
  }


  public function deleteVideo($id){

    $video = Video::where('id',$id)->find($id);
    $video->delete();


         return 'Video Trashed';
   


  }

  public function usersVideos($id){
    $videos = Video::with('user.followers')->where('user_id',$id)->get();
    return view('dashboard.user.videos',compact('videos'));


  }


  public function approve_video($id){

    $video = Video::where('id',$id)->first();
    $video->status = 'approved';
    if($video->update()){

      return back()->with('message','Video Approved');

    }else{

      return back()->with('message','Failed To Approve Video');

    }

  }

  
  public function reject_video($id){

    $video = Video::where('id',$id)->first();

    if($video->delete()){
      return back()->with('message','Video Deleted');

    }else{
      return back()->with('message','Failed To Approve Video');

    }

  }

  public function upload_request(){

    $videos = Video::where('status','pendding')->get();
    return view('dashboard.video.requests',compact('videos'));

  }


  public function filter(Request $request){

    $month = $request->month;
    $year = $request->year;
    if ($request->has('month')) {
      $videos = Video::with('user.followers')->whereRaw('MONTH(created_at) = '.$month)->get();
    }
    if($request->has('year')){
      if($year != null){
        $videos = Video::with('user.followers')->whereRaw('YEAR(created_at) = '.$year)->get();

      }
      
    }
    return view('frontend.video.search',compact('videos'));
  }



  public function markasRead(Request $request){


    
    $notification_id = $request->id;

    // DB::table('notifications')->where('id',$notification_id)->update(['read_at'=>Carbon::now()]);
  }


  public function mobileView($id){
    /* code edited by opti
      this function will return the selected video by id first then rest of the videos.
    */
     $videosAll = Video::where('status','=','approved')->with('user.followers')->with('comments.user')->with('user.profile')->latest()->limit(20);
     $videos = Video::where('id', $id)->union($videosAll)->get();
    return view('frontend.mobile-player',compact('videos'));


   

  }




          

     
}
