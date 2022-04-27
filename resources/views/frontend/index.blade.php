@extends('layouts.frontend.app')
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
}
.comment-section {
  padding: 2px 15px 2px 15px;
  overflow-y: scroll;
  height: 65%;
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

#desk-play-icon {
    
    display:block;

 }

 #mobile-play-icon {
    
    display:none;

 }

 #imgdesk{
    display: block;
 }

 #imgMobile{
   display:none;

 }
 @media screen and (max-width: 700px) {

#imgdesk {

   display:none;

}
#imgMobile {
 

display:block;

}

}
@media screen and (max-width: 700px) {

    #desk-play-icon {
    
       display:none;
 
    }
    #mobile-play-icon {
    
    display:block;

 }

}

.select-month-year {
   background: transparent;
   color: #fff;
   border: 0px;
   width: 85px;
}
.video-title-h4 {
   font-size: 18px;
   margin-bottom: 0px;
}
.video-title-p {
   color: #fff
}



</style>
@endsection
@section('content')
<div class="col-md-8">

<div class="col-12">
<form action="{{route('video.filter')}}" >
   <div class="row" style="justify-content: end;margin-bottom: 15px;margin-right: 0px;">

         @csrf
      <div class="col-1">
         <select class="form-control select-month-year select-month" name="month">
            <option value="1">Jan</option>
            <option value="2">Feb</option>
            <option value="3">March</option>
            <option value="4">Apr</option>
            <option value="5">May</option>
            <option value="6">Jun</option>
            <option value="7">Jul</option>
            <option value="8">Aug</option>
            <option value="9">Sep</option>
            <option value="10">OCt</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
         </select>
      </div>
      <div class="col-1">
         <select class="form-control select-month-year select-year" name="year">
            <option value="2022">2022</option>
            <option value="2021">2021</option>
            <option value="2020">2020</option>
            <option value="2019">2019</option>
            <option value="2018">2018</option>
         </select>
         {{-- <input type='number' name="year" min="1900" max="2300" class="form-control" style="background-color:#fff"> --}}
      </div>
      <div class="col-2" style="text-align: end">
         <button type="submit" class="btn btn-primary">Filter</button>
      </div>

   </div>
   </form>
</div>
             
   <div class="row">
      
                           @foreach($videos as $video)
                              <div class="col-xl-4 col-sm-6 col-xs-6 col-6 mb-3">
                              <div class="video-card" >
                                 <div class="video-card-image">
                                    <a class="play-icon" href="#video-card-{{$video->id}}" id="desk-play-icon" data-fancybox="group"><i class="fas fa-play-circle"></i></a>
                                    <a class="play-icon" href="{{route('mobile.view', $video->id)}}" id="mobile-play-icon"><i class="fas fa-play-circle"></i></a>
                                   
                                    <a href="#" >
                                       @if (!empty($video->thumbnail))
                                       <img class="img-fluid" src="{{asset('storage'.$video->thumbnail)}}" alt=""> 
                                       @else
                                       <img class="img-fluid" src="{{asset('assets/img/404.png')}}" alt="">
                                       @endif
                                       
                                    </a>
                                 </div>
                                 <div class="video-card-body">
                                    <div class="video-title">
                                       <a href="#" class="video-user">
                                       @if(empty($video->user->profile))
                                          <img alt="Avatar" src="{{asset('assets/img/user.png')}}">
                                       @else
                                          <img alt="Avatar" src="{{asset('storage'.$video->user->profile->image)}}">
                                       @endif  
                                         {{ !empty($video->user->name) ? $video->user->name:''}}
                                         
                                       </a>
                                    </div>
                                 </div>
                                 
                                 <div class="video-card-body body-hastags">
                                    <h4 class="video-title-h4">{{$video->title}}</h4>
                                    <p class="video-title-p">{{Str::limit($video->description, 20)}}</p>
                                    @php $tags =  json_decode($video->tags) @endphp
                                    <div class="video-hastags">
                                       @foreach($tags as $tag)
                                       <a href="{{route('tag.video',$tag)}}" class="">
                                          #{{$tag}}
                                       </a>
                                       @endforeach
                                    </div>
                                 </div>
                              </div>
                              <!-- video starts -->
                              <div class="video" id="video-card-{{$video->id}}" style="display: none;">
                              @if (!empty($video->video_url))
                              <video class="video__player" src="{{asset('storage'.$video->video_url)}}"></video>
                              @else
                              <video class="video__player" src="{{asset('assets/img/screenshot.png')}}"></video> 
                              @endif
                                 
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
                                       <span data-id ="{{$video->id}}" class="videcomment-btn material-icons"> message </span>
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
                                 
                                 <!-- <div class="usercomments">
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
                                 </div> -->
                                
                              </div>
                           </div>

                        
                                 <!-- footer -->
                                 <div class="videoFooter">
                                 <div class="videoFooter__text">
                                    <div class="video-user-own">
                                    <a href="#" class="video-user video-user-fancy">
                                          <img alt="Avatar" src="{{asset('assets/img/user.png')}}">
                                        
                                       {{ !empty($video->user->name) ? $video->user->name:'' }}
                                        
                                    </a>
                                    </div>
                                    <!-- <p class="videoFooter__description">Best Video Ever</p> -->
                                 </div>
                                 </div>
                              </div>
                              <!-- video ends -->
                           </div>
                           @endforeach
<!--                       
                           <div class="ajax-load text-center" style="display:none">
	<p><img src="{{asset('assets/plugin/loader.gif')}}"></p>
</div> -->
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="single-video-right">
                           <div class="row">
                              <div class="col-6 mbd-none">
                                 <h3>Categories</h3>
                              </div>
                              <div class="col-6 mbd-none tt-right">
                                 <div class="col-12">
                               
                                 </div>
                              
                                 <form>
                                 
                                  
                                 </form>
                              </div>
                           <div class="row">
                              <div class="container" style="padding: 20px;">
                                 <ul class="tags">
                                  @foreach($videotags as $key => $videotag) 
                                       @foreach ($videotag as $tag)
                                       <li><a href="{{route('tag.video',preg_replace('/[^a-zA-Z0-9_ %\.\(\)%&-]/s', '', $tag))}}" class="tag" style="background: {{sprintf("#%06x",rand(0,16777215))}}" >#{{ preg_replace('/[^a-zA-Z0-9_ %\.\(\)%&-]/s', '', $tag) }}</a></li>
                                       @endforeach
                                 @endforeach 
                                    <!-- <li><a href="#" class="tag" style="background: linear-gradient(135deg, #4eda92 1%,#56e0cb 100%)">#JavaScript</a></li>
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
                              <!--profile-->
                              @foreach($user as $user)
                               
                            
                              <div class="col-md-12 mbd-none">
                                 <div class="profl"> 
                                    <div class="">
                                       <a href="{{route('user.profile',$user->id)}}" class="video-user">
                                          @if(empty($user->profile->image))
                                          <img alt="Avatar" src="{{asset('assets/img/dummy.png')}}">
                                          @else
                                          <img alt="Avatar" src="{{asset('storage'.$user->profile->image)}}">
                                          @endif

                                       </a>
                                    </div>
                                    <div class="">
                                       <div class="video-title">
                                          <a href="{{route('user.profile',$user->id)}}">{{$user->name}}</a>
                                       </div>
                                       <div class="video-view">
                                          {{count($user->followers)}}followers  &nbsp;<i class="fas fa-user"></i> 
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                            
                           </div>
                        </div>
                     </div>
                     <div class="video-block mbd-none section-padding"> 
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