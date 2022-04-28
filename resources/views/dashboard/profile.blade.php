@extends('layouts.dashboard.app')
@section('style')
<style>
    .views-count{
        margin: 0;
        text-align: right;
    }
</style>
@endsection
@section('content')
<div id="content-wrapper">
            <div class="container-fluid pb-0">
                <div class="row">
                    <div class="col-lg-12 text-center pt-3">
                    <img alt="Avatar" style="border-radius:50%; width: 7%" class="mt-2 mb-2" src="{{asset('storage'.$profile->profile->image)}}">
                    <h4>{{$profile->name}}</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                 @if ($profile->role == 'admin')
                 <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5"><b>{{$videos_count}}</b>Videos</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('admin.videos')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5"><b>{{$users_count}}</b>Users</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('admin.users')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5"><b>{{$pendding_videos}}</b>Pending Videos</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('upload.request')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5"><b>{{$approved_videos}}</b>Approved Videos</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('admin.videos')}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                 @else
                 <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-users"></i>
                           </div>
                           <div class="mr-5"><b>{{$videos}}</b>Videos</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('users.videos',$profile->id)}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-warning o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-video"></i>
                           </div>
                           <div class="mr-5"><b>{{$followers}}</b> Followers</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('users.follower',$profile->id)}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-warning o-hidden h-100 border-none">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-video"></i>
                           </div>
                           <div class="mr-5"><b>{{$following}}</b> Followings</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('users.following',$profile->id)}}">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                 @endif


               </div>
               <hr>

               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <!-- <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Sort by <i class="fa fa-caret-down" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                              </div> -->

                              @if(Auth::user())
                              @if(Auth::user()->id != $profile->id)
                              <a type="button" class="btn btn-danger" data-id="{{$profile->id}}" id="followBtn">
                                 {{App\Models\Follower::follow_status($profile->id)}}
                              </a>

                              @endif
                              @endif
                           </div>
                           @if($profile->role != 'admin')
                           <h6>My Videos</h6>
                           @endif
                        </div>
                     </div>
                     <div class="video-block section-padding">
                        <!-- Video section start-->
                        <div class="video-block section-padding">

               </div>
             @if ($profile->role != 'admin')
             <div class="row revrs">
                <div class="col-md-12">
                   <div class="row ">
                           @forelse ($profile->videos as $data)

                           <div class="col-xl-4 col-sm-6 col-xs-6 col-6 mb-3">
                              <div class="video-card" >
                                 <div class="video-card-image">
                                    <a class="play-icon" href="#video-card-{{$data->id}}" data-fancybox="group"><i class="fas fa-play-circle"></i></a>

                                     <a href="#" >
                                         @if (!empty($data->thumbnail))
                                             <img class="img-fluid" src="{{asset('storage'.$data->thumbnail)}}" alt="">
                                         @else
                                             <img class="img-fluid" src="{{asset('assets/img/404.png')}}" alt="">
                                         @endif

                                     </a>
                                 </div>
                                 <div class="video-card-body">
                                     <div class="video-title">
                                         <div class="row">
                                             <div class="col-lg-6 pt-2 video-top-head-left">
                                                 <a href="#" class="video-user">
                                                     @if(empty($data->user->profile))
                                                         <img alt="Avatar" src="{{asset('assets/img/user.png')}}">
                                                     @else
                                                         <img alt="Avatar" src="{{asset('storage'.$data->user->profile->image)}}">
                                                     @endif
                                                     {{ !empty($data->user->name) ? $data->user->name:''}}

                                                 </a>
                                             </div>
                                             <div class="col-lg-6 pt-2">
                                                 <p class="text-white views-count">{{$data->views}} Views</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="video-card-body body-hastags">
                                    <div class="video-hastags">
                                        <h4 class="video-title-h4">{{$data->title}}</h4>
                                        <p class="video-title-p">{{Str::limit($data->description, 20)}}</p>
                                       <!-- <a href="#" class="">
                                       <i class="fas fa-edit"></i> </a>
                                       <a href="#" class="">
                                       <i class="fas fa-trash"></i></a> -->

                                    </div>
                                 </div>
                              </div>
                              <!-- video starts -->
                              <div class="video" id="video-card-{{$data->id}}" style="display: none;">
                                 <video class="video__player" src="{{asset('storage'.$data->video_url)}}"></video>

                                 <!-- sidebar -->
                                 <div class="videoSidebar">
                                 <div class="videoSidebar__button">
                                    @if (Auth::user())
                                       <span class="material-icons likeBtn" data-video="{{$data->id}}" data-id="{{$data->user->id}}">{{App\Models\LikedMessage::liked($data->id)}}</span>
                                    @else
                                       <span class="material-icons likeBtn" data-video="{{$data->id}}" data-id="{{$data->user->id}}">favorite_border</span>
                                    @endif
                                    <p>{{App\Models\LikedMessage::countLike($data->id)}}</p>
                                 </div>

                                 <div class="videoSidebar__button">
                                    <span class="material-icons"> message </span>
                                    <p>{{App\Models\Comment::countComment($data->id)}}</p>
                                 </div>

                                 </div>
                                 <div class="videoComments d-none" id="videoComments{{$data->id}}">
                              <div class="comment-header">
                                 <span class="comment-heading">Comments</span>
                                 <span class="float-right close-comment"><i class="fas fa-times"></i></span>
                              </div>
                              <div class="comment-section">
                                 <div class="usercomments">
                                 <div class="usercomments">
                                 <div class="row">

                                 <input type="text" class="comment-input" id="comment{{$data->id}}" >
                                    <button class="btn btn-primary comment comment-btn" data-id="{{$data->id}}" type="button"><i class="far fa-comment-dots"></i></button>
                                 </div>

                                 </div>
                                 </div>

                              </div>
                           </div>

                                 <!-- footer -->
                                 <div class="videoFooter">
                                 <div class="videoFooter__text">
                                    <div class="video-user-own">
                                    <!-- <a href="#" class="video-user video-user-fancy">
                                          <img alt="Avatar" src="img/user.png">
                                          Osahan
                                    </a> -->
                                    </div>
                                    <!-- <p class="videoFooter__description">Best Video Ever</p> -->
                                 </div>
                                 </div>
                              </div>
                              <!-- video ends -->
                           </div>
                           @empty
                           <div class="col-xl-12 col-sm-6 col-xs-6 col-6 mb-3">
                              <h5>No Video Uploaded</h5>
                           </div>
                           @endforelse
                   </div>
                </div>

             </div>

             @else
             @endif

          </div>

                  </div>
               </div>

               @auth
                   @if (Auth::user()->role == 'admin')
                   <h5>Users Detail</h5>
                   <table class="table" id="usertable">
      <thead>
        <tr>

          <th scope="col">User</th>
          <th scope="col">Number Of Videos</th>
          <th scope="col">Number Of Followers</th>

        </tr>
      </thead>
      <tbody>

      @forelse ($users as $user)
      <tr>
          <th scope="row">{{$user->name}}</th>
          <td>{{count($user->videos)}}</td>
          <td>{{count($user->followers)}}</td>

        </tr>
      @empty

      @endforelse


       <tr>

          <th scope="col">User</th>
          <th scope="col">Number Of Videos</th>
          <th scope="col">Number Of Followers</th>
       </tr>
      </tbody>
    </table>
                   @endif
                @endauth


               <hr class="mt-0">

            </div>

         </div>
@endsection
@section('script')
<script>
     $("#tags").select2({tags:["red", "green", "blue"]});

     $(document).ready(function(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(".videcomment-btn").click(function(){

var id = $(this).data('id');
$("#videoComments"+id).toggleClass('d-none');
});
$(".close-comment").click(function(){
$(".videoComments").addClass('d-none');
});

$("#followBtn").on('click',function(){
    var id = $(this).data('id');
    $.ajax({
                type:'POST',
                url:'/follow/'+id,
                data:{_token: "{{ csrf_token() }}"
                },
                success: function( msg ) {

                    $("#followBtn").html(msg);
                }
            });

})


     })
</script>
@endsection
