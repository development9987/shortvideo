@extends('layouts.frontend.app')
@section('content')

                       
<div class="video-block section-padding"> <!-- Video section start-->
             
             <div class="row revrs">
                <div class="col-md-8">
                   <div class="row ">
                 
                      @foreach($videos as $video)
                      <div class="col-xl-4 col-sm-6 col-xs-6 col-6 mb-3">
                         <div class="video-card" >
                            <div class="video-card-image">
                               <a class="play-icon" href="#video-card-{{$video->id}}" data-fancybox="group"><i class="fas fa-play-circle"></i></a>
                               <a href="#"><img class="img-fluid" src="{{asset('storage'.$video->thumbnail)}}" alt=""></a>
                            </div>
                            <div class="video-card-body">
                               <div class="video-title">
                                  <a href="#" class="video-user">
                                     <img alt="Avatar" src="{{asset('assets/img/user.png')}}">
                                     {{$video->user->name}} </a>
                               </div>
                            </div>
                            <div class="video-card-body body-hastags">
                            @php $tags =  json_decode($video->tags) @endphp
                               <div class="video-hastags">
                                   @foreach($tags as $tag)
                                  <a href="{{route('tag.video',$tag)}}" class="">
                                     #{{$tag}} </a>
                                    @endforeach
                               </div>
                            </div>
                         </div>
                         <!-- video starts -->
                         <div class="video" id="video-card-{{$video->id}}" style="display: none;">
                            <video class="video__player" src="{{asset('storage'.$video->video_url)}}"></video>
                   
                            <!-- sidebar -->
                            <div class="videoSidebar">
                            <div class="videoSidebar__button" >
                                    @if (Auth::user())
                                    <span class="material-icons likeBtn" data-video="{{$video->id}}" data-id="{{$video->user->id}}">{{App\Models\LikedMessage::liked($video->id)}}</span>
                                    @else
                                    <span class="material-icons likeBtn" data-video="{{$video->id}}" data-id="{{$video->user->id}}">favorite_border</span>
                                    @endif
                                 
                              <p>{{App\Models\LikedMessage::countLike($video->id)}}</p>
                                 </div>
                        
                                 <div class="videoSidebar__button">
                              <span data-id="{{$video->id}}" class="videcomment-btn material-icons"> message </span>
                               <p>{{App\Models\Comment::countComment($video->id)}}</p>
                           </div>
 
                            </div>
                   
                            <!-- footer -->
                            <div class="videoFooter">
                            <div class="videoFooter__text">
                               <div class="video-user-own">
                               <a href="#" class="video-user video-user-fancy">
                                     <!-- <img alt="Avatar" src="img/user.png"> -->
                                     {{$video->user->name}}
                               </a>
                               </div>
                               <p class="videoFooter__description">{{$video->title}}</p>
                            </div>
                            </div>
                         </div>
                         <!-- video ends -->
                      </div>
                      @endforeach
                   </div>
                </div>
                <div class="col-md-4">
                   <div class="single-video-right">
                      <div class="row">
                         <div class="col-6 mbd-none">
                            <h3>Categories</h3>
                         </div>
                       
                      </div>
                      <div class="row">
                         <div class="container" style="padding: 20px;">
                            <ul class="tags">
                               @foreach($tags as $tag)
                               <li><a href="{{route('tag.video',$tag)}}" class="tag">{{$tag}}</a></li>
                               @endforeach
                               <!-- <li><a href="#" class="tag">#CSS</a></li>
                               <li><a href="#" class="tag" style="background: linear-gradient(135deg, #4eda92 1%,#56e0cb 100%)">#JavaScript</a></li>
                               <li><a href="#" class="tag" style="background: linear-gradient(135deg, #ff25bc 0%,#7553ff 100%);">#Videos</a></li>
                               <li><a href="#" class="tag">#shortvideos</a></li>
                               <li><a href="#" class="tag">#toprated</a></li>
                               <li><a href="#" class="tag">#latest</a></li>
                               <li><a href="#" class="tag">#new</a></li>
                               <li><a href="#" class="tag">#action</a></li>
                               <li><a href="#" class="tag">#movies</a></li>
                               <li><a href="#" class="tag">#drama</a></li>
                               <li><a href="#" class="tag">#crime</a></li> -->
                            </ul>
                   
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-md-12 mbd-none">
                               <h3>Top profiles</h3>
                         </div>
                  
                           @foreach($user as $user)
                              <div class="col-md-12 mbd-none">
                                 <div class="profl"> 
                                    <div class="">
                                       <a href="{{route('user.profile',$user->id)}}" class="video-user">
                                          <img alt="Avatar" src="{{asset('assets/img/user.png')}}">
                                       </a>
                                    </div>
                                    <div class="">
                                       <div class="video-title">
                                          <a href="{{route('user.profile',$user->id)}}">{{$user->name}}</a>
                                       </div>
                                       <div class="video-view">
                                          {{count($user->followers)}}followers  &nbsp;<i class="fas fa-calendar-alt"></i> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           @endforeach
                        
                      </div>
                   </div>
                </div>
             </div>
          </div>  
           
         
      
@endsection
@section('scripts')
<script>


var page = 1;
$(window).scroll(function() {
 if($(window).scrollTop() + $(window).height() >= $(document).height()) {
     page++;
     loadMoreData(page);
 }
});


$(document).ready(function(){

$(".video").on("contextmenu",function(e){
               return false;
      });

$(".videcomment-btn").click(function(){

var id = $(this).data('id');
$("#videoComments"+ id).toggleClass('d-none');
});
$(".close-comment").click(function(){
$(".videoComments").addClass('d-none');
});
  $.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$('.comment').on('click',function(){
var id = $(this).data('id');
var comment = $("#comment"+id).val();


$.ajax({
          type:'POST',
          url:'/post/comment',
          data:{_token: "{{ csrf_token() }}",
          'video_id' : id,
          'comment' : comment
      
          },
          success: function( msg ) {
                 console.log(msg.body)       
             var result = '<div class="usercomments"><div class="video-title"><a href="#" class="video-user"><img alt="Avatar" src="g">Osahan </a></div><div class="comment"><p>'+msg.body+'</p></div><div class="comment-timestamp"><p>04-21</p></div></div>'
             $(".commentarea").append(result)
          },
          error(err){

if(err.status === 401 ){
window.location.replace("http://shortvideo2.test/login");
}

}
      });

})

$(".likeBtn").on('click',function(){

var id = $(this).data('id');
var video_id = $(this).data('video');
$.ajax({
          type:'POST',
          url:'/like/'+id,
          data:{_token: "{{ csrf_token() }}",
          'video_id' : video_id
          },
          success: function( msg ) {

if(msg == "Liked"){
$(".likeBtn").text('favorite')

}else if(msg == "unLiked"){
$(".likeBtn").text('favorite_border')
}
             
              
          },
          error(err){

            if(err.status === 401 ){
               window.location.replace("http://shortvideo2.test/login");
            }

          }
      });

})


})


function loadMoreData(page){
$.ajax(
     {
         url: '?page=' + page,
         type: "get",
         beforeSend: function()
         {
             $('.ajax-load').show();
         }
     })
     .done(function(data)
     {
         if(data.html == " "){
             $('.ajax-load').html("No more records found");
             return;
         }
         $('.ajax-load').hide();
         $("#post-data").append(data.html);
     })
     .fail(function(jqXHR, ajaxOptions, thrownError)
     {
         //   alert('server not responding...');
     });
}


</script>

@endsection