@extends('layouts.frontend.app')
@section('content')
<div class="video-block section-padding"> <!-- Video section start-->
             
             <div class="row revrs">
                <div class="col-md-12">
                   <div class="row ">
                       @forelse ($videos as $video)
                       <div class="col-xl-4 col-sm-6 col-xs-6 col-6 mb-3">
                         <div class="video-card" >
                            <div class="video-card-image">
                               <a class="play-icon" href="#video-card-{{$video->id}}" data-fancybox="group"><i class="fas fa-play-circle"></i></a>
                               <a href="#"><img class="img-fluid" src="{{asset('storage'.$video->thumbnail)}}" alt=""></a>
                               <h6>{{$video->title}}</h6>
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
                                   @php $tags = json_decode($video->tags) @endphp
                                   @foreach($tags as $tag)
                                  <a href="#" class="">
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
                        
                                 <div class="videoSidebar__button videcomment-btn">
                              <span data-id="{{$video->id}}" class=" material-icons"> message </span>
                               <p>{{App\Models\Comment::countComment($video->id)}}</p>
                               
                           </div>
 
                            </div>
                            <div class="videoComments d-none" id="videoComments{{$video->id}}">
                              <div class="comment-header">
                                 <span class="comment-heading">Comments</span>
                                 <span class="float-right close-comment"><i class="fas fa-times"></i></span>
                              </div>
                              <div class="comment-section">
                                 <div class="usercomments">
                                    <div class="video-title">
                                       <a href="#" class="video-user">
                                          <img alt="Avatar" src="img/user.png">
                                          Osahan </a>
                                    </div>
                                    <div class="comment">
                                       <p>dummy comment</p>
                                    </div>
                                    <div class="comment-timestamp">
                                       <p>04-21</p>
                                    </div>
                                 </div>
                          
                              </div>
                           </div>
                   
                            <!-- footer -->
                            <div class="videoFooter">
                            <div class="videoFooter__text">
                               <div class="video-user-own">
                               <a href="#" class="video-user video-user-fancy">
                                     <!-- <img alt="Avatar" src="img/user.png"> -->
           
                               </a>
                               </div>
                               <p class="videoFooter__description">{{$video->description}}</p>
                            </div>
                            </div>
                         </div>
                         <!-- video ends -->
                      </div>
                       @empty
                           <h4>No Video Found</h4>
                       @endforelse
                    
                  
                   </div>
                </div>
              
             </div>
          </div>
@endsection
@section('script')
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
           alert('server not responding...');
     });
}


</script>

@endsection