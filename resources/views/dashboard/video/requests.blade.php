@extends('layouts.dashboard.app')
@section('content')
@section('content')
<div id="content-wrapper">
            <div class="container-fluid pb-0">
<div class="video-block section-padding"> <!-- Video section start-->
          
             <div class="row revrs">
                <div class="col-md-12">
                <h3>My Videos</h3>
                   <div class="row ">
                       @forelse ($videos as $video)
                       <div class="col-xl-4 col-sm-6 col-xs-6 col-6 mb-3">
                         <div class="video-card" >
                            <div class="video-card-image">
                               <a class="play-icon" href="#video-card-1" data-fancybox="group"><i class="fas fa-play-circle"></i></a>
                               <a href="#"><img class="img-fluid" src="{{asset('storage'.$video->thumbnail)}}" alt=""></a>
                            </div>
                            <div class="video-card-body">
                               <div class="video-title">
                                  <a href="#" class="video-user">
                                     <img alt="Avatar" src="img/user.png">
                                     Osahan </a>
                               </div>
                            </div>
                            <div class="video-card-body body-hastags">
                               <div class="video-hastags">
                                   
                                    
                                    <a class="btn btn-primary" href="{{route('approve.video',$video->id)}}">Approve</a>
                                    <a class="btn btn-danger"  href="{{route('reject.video',$video->id)}}" >Cancel</a>
                                  <!-- <a href="#" class="">
                                     #Osahan </a> -->
                               </div>
                            </div>
                         </div>
                         <!-- video starts -->
                         <div class="video" id="video-card-1" style="display: none;">
                            <video class="video__player" src="{{asset('storage'.$video->video_url)}}"></video>
                   
                            <!-- sidebar -->
                            <div class="videoSidebar">
                            <div class="videoSidebar__button">
                               <span class="material-icons">favorite_border</span>
                               <p>12</p>
                            </div>
                   
                            <div class="videoSidebar__button">
                               <span class="material-icons"> message </span>
                               <p>23</p>
                            </div>
 
                            </div>
                   
                            <!-- footer -->
                         
                         
                         </div>
                         <!-- video ends -->
                      </div> 
                       @empty
                           <div>
                               <h4>No Videos Uploaded</h4>
                           </div>   
                       @endforelse
                   
                
                   </div>
                </div>
               
             </div>
          </div>
</div>
</div>
@endsection