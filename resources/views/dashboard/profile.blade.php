@extends('layouts.dashboard.app')
@section('content')
<div id="content-wrapper">
            <div class="container-fluid pb-0">
            <h4>{{$profile->name}}</h4><hr>
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
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <!-- <span class="float-left">View Details</span> -->
                        <!-- <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span> -->
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
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <!-- <span class="float-left">View Details</span> -->
                        <!-- <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span> -->
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
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <!-- <span class="float-left">View Details</span> -->
                        <!-- <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span> -->
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
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <!-- <span class="float-left">View Details</span> -->
                        <!-- <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span> -->
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
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <!-- <span class="float-left">View Details</span> -->
                        <!-- <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span> -->
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
                        <a class="card-footer text-white clearfix small z-1" href="#">
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
                        <a class="card-footer text-white clearfix small z-1" href="#">
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
                        <table class="table " id="usertable">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Number Of Videos</th>
      <th scope="col">Number Of Followers</th>
     
    </tr>
  </thead>
  <tbody>
     @forelse ($users as $user)
     <tr>
      <th scope="row">1</th>
      <td>{{$user->name}}</td>
      <td>{{count($user->videos)}}</td>
      <td>{{count($user->followers)}}</td>
</tr>
     @empty
        
          <tr>
             <td>No User Found</td>
          </tr>   
     @endforelse


    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Number Of Videos</th>
      <th scope="col">Number Of Followers</th>
  
    </tr>
  </tbody>
</table>
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
                                    <a href="#"><img class="img-fluid" src="{{asset('storage'.$data->thumbnail)}}" alt=""></a>
                                 </div>
                                 <div class="video-card-body">
                                    <div class="video-title">
                                       <a href="#" class="video-user">
                                          <!-- <img alt="Avatar" src="img/user.png"> -->
                                         {{$data->title}} </a>
                                    </div>
                                 </div>
                                 <div class="video-card-body body-hastags">
                                    <div class="video-hastags">
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
                                    <span class="material-icons">favorite_border</span>
                                    <p>12</p>
                                 </div>
                        
                                 <div class="videoSidebar__button">
                                    <span class="material-icons"> message </span>
                                    <p>23</p>
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
                           <div class="col-xl-4 col-sm-6 col-xs-6 col-6 mb-3">
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