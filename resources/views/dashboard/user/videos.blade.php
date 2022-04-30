@extends('layouts.dashboard.app')
@section('style')
<style>
  .videoComments{
  width: 100%;
  height: 220px;
  position: absolute;
  background: #fff;
  bottom: 0px;
  z-index: 3;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}
.comment-header {
  padding: 15px;
  margin-left: 5px;
}
.comment-section {
padding: 2px 15px 2px 15px;
overflow-y: scroll;
height: 65%;
margin-left:5px;
}
.comment-section::-webkit-scrollbar {
display: none;
}
.comment-section a {
color: #000;
font-weight: 600;
text-decoration: none;
}
.comment p {
font-size: 15px;
}
.comment-timestamp p {
margin-top: -15px;
font-size: 10px;
}
.comment-input {
  width: 75%;
  background: #efefef;
  border-top: 1px solid #bfbfbf !important;
  border-bottom: 1px solid #bfbfbf !important;
  border-left: 1px solid #bfbfbf !important;
  border-right: 0px;
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
  margin-right: -1px;
  padding: 8px;
  margin-left: 28px;
}

.comment-btn {
  width: 10%;
  background: #efefef;
  color: #ff0000;
  padding: 4px 4px 4px 4px;
  border-top: 1px solid #bfbfbf !important;
  border-bottom: 1px solid #bfbfbf !important;
  border-right: 1px solid #bfbfbf !important;
  border-left: 1px solid #bfbfbf !important;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
}
</style>
@endsection
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
                               <a class="play-icon" href="#video-card-{{$video->id}}" data-fancybox="group"><i class="fas fa-play-circle"></i></a>
                               <a href="#"><img class="img-fluid" src="{{asset('storage'.$video->thumbnail)}}" alt=""></a>
                            </div>
                            <div class="video-card-body">
                               <div class="video-title">
                                  <a href="#" class="video-user">
                                     <!-- <img alt="Avatar" src="img/user.png">
                                     Osahan </a> -->
                               </div>
                            </div>
                            <div class="video-card-body body-hastags">
                               <div class="video-hastags">
                                    <a href="{{route('edit.video',$video->id)}}" class="">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    
                                  <a class="dltBtn"   data-id="{{$video->id}}">
                                  <i class="fas fa-trash"></i> </a>
                                  <!-- <a href="#" class="">
                                     #Osahan </a> -->
                               </div>
                            </div>
                         </div>
                         <!-- video starts -->
                         <div class="video" id="video-card-{{$video->id}}" style="display: none;">
                            <video class="video__player" src="{{asset('storage/public'.$video->video_url)}}"></video>
                   
                            <!-- sidebar -->
                            <div class="videoSidebar">
                            <div class="videoSidebar__button">
                               <span class="material-icons">favorite_border</span>
                               <!-- <p>12</p> -->
                            </div>
                   
                            <div class="videoSidebar__button">
                               <span data-id ="{{$video->id}}" class="videcomment-btn material-icons"> message </span>
                               <!-- <p>23</p> -->
                            </div>
 
                            </div>
                            <div class="videoComments d-none" id="videoComments{{$video->id}}">
                              <div class="comment-header">
                                 <span class="comment-heading">Comments</span>
                                 <span class="float-right close-comment"><i class="fas fa-times"></i></span>
                              </div>
                              <div class="comment-section">
                              <div class="usercomments">
                                 <div class="row">

                                 <input type="text" class="comment-input" id="comment{{$video->id}}" >

                                 <button class="btn btn-primary comment comment-btn" data-id="{{$video->id}}" type="button"><i class="far fa-comment-dots"></i></button>


                                 </div>

                                 </div>
                                   <div class="commentarea"></div>

                                @forelse ($video->comments as $comment)
                                <div class="usercomments">
                                    <div class="video-title">
                                       <a href="#" class="video-user">
                                          <!-- <img alt="Avatar" src="img/user.png"> -->
                                          {{$comment->user->name}} </a>
                                    </div>
                                    <div class="comment">
                                       <p>{{$comment->body}}</p>
                                    </div>
                                    <div class="comment-timestamp">
                                       <p>{{$comment->created_at}}</p>
                                    </div>
                                 </div>
                                @empty
                                   no comments
                                @endforelse

                              

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
@section('script')
<script>
   $(document).ready(function(){
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
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
                 window.location.replace(base_url+"/login");
              }

            }
        });

})


 })

      $('.dltBtn').click(function(){
         var id = $(this).data('id');
         
         $.ajax({
                type:'POST',
                url:'/delete/video/'+id,
                data:{_token: "{{ csrf_token() }}"
                },
                success: function( msg ) {
                   alert(msg)
                   location.reload();
                }
            });
      })

      $(".videcomment-btn").click(function(){

var id = $(this).data('id');
$("#videoComments"+ id).toggleClass('d-none');
});
$(".close-comment").click(function(){
$(".videoComments").addClass('d-none');
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
   window.location.replace(base_url+"/login");
}

}
            });

})


   })
</script>
@endsection
