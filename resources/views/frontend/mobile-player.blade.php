<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TikTok Clone</title>
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/mobile-videos-page.css')}}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    
  </head>
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
    padding: 8px 4px 8px 4px;
    border-top: 1px solid #bfbfbf !important;
    border-bottom: 1px solid #bfbfbf !important;
    border-right: 1px solid #bfbfbf !important;
    border-left: 1px solid #bfbfbf !important;
    border-top-right-radius: 20px;
    border-bottom-right-radius: 20px;
    margin-left: -3px;
}
.d-none {
  display: none;
}
.comment-input-section {
    text-align: center;
}

  </style>
  <body>
    <div class="app__videos">
      <!-- video starts -->
  @forelse ($videos as $video)
  <div class="video">
        <video class="video__player" src="{{asset('storage'.$video->video_url)}}"></video>

        <!-- sidebar -->
        <div class="videoSidebar">
          <div class="videoSidebar__button">
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


          {{-- <div class="videoSidebar__button">
            <span class="material-icons"> share </span>
            <p>75</p>
          </div> --}}
        </div>
        <div class="videoComments d-none" id="videoComments{{$video->id}}">
                              <div class="comment-header">
                                 <span class="comment-heading">Comments</span>
                                 <span class="float-right close-comment"><i class="fas fa-times"></i></span>
                              </div>
                              <div class="comment-section">
                                <div class="comment-input-section">
                                  <input type="text" class="comment-input" id="comment{{$video->id}}" >
                                  <button class="btn btn-primary comment comment-btn" data-id="{{$video->id}}" type="button"><i class="fas fa-comment-dots"></i></button>
                                </div>
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
        <div class="videoFooter">
          <div class="videoFooter__text">
            <h3>Somanath Goudar</h3>
            <p class="videoFooter__description">Best Video Ever</p>

            <div class="videoFooter__ticker">
              <span class="material-icons videoFooter__icon"> music_note </span>
              <marquee>Song name</marquee>
            </div>
          </div>
          <img
            src="https://static.thenounproject.com/png/934821-200.png"
            alt=""
            class="videoFooter__record"
          />
        </div>
      </div> 
  @empty
      
  @endforelse

    
          

     
      <!-- video ends -->

      <!-- video starts -->
      <div class="video">
        <video class="video__player" src="{{asset('assets/video2.mp4')}}"></video>

        <!-- sidebar -->
        <div class="videoSidebar">
          <div class="videoSidebar__button">
            <span class="material-icons"> favorite_border </span>
            <p>12</p>
          </div>

          <div class="videoSidebar__button">
            <span class="material-icons"> message </span>
            <p>23</p>
          </div>

          <div class="videoSidebar__button">
            <span class="material-icons"> share </span>
            <p>75</p>
          </div>
        </div>

        <!-- footer -->
        <div class="videoFooter">
          <div class="videoFooter__text">
            <h3>Somanath Goudar</h3>
            <p class="videoFooter__description">Best Video Ever</p>

            <div class="videoFooter__ticker">
              <span class="material-icons videoFooter__icon"> music_note </span>
              <marquee>Song name</marquee>
            </div>
          </div>
          <img
            src="https://static.thenounproject.com/png/934821-200.png"
            alt=""
            class="videoFooter__record"
          />
        </div>
      </div>
      <!-- video ends -->
    </div>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script>
      const videos = document.querySelectorAll('video');

      for (const video of videos) {
        video.addEventListener('click', function () {
          console.log('clicked');
          if (video.paused) {
            video.play();
          } else {
            video.pause();
          }
        });
      }

      $(document).ready(function(){


   

      $(".video").on("contextmenu",function(e){
                    return false;
            });

      $(".videcomment-btn").click(function(){

        var id = $(this).data('id');
        console.log($("#videoComments"+id))
        $("#videoComments"+id).toggleClass('d-none');
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
                    window.location.replace("/login");
                  }

                }
            });

      })


      })



    </script>
  </body>
</html>
