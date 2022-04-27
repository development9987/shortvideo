
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>VIDOE - Video Streaming Website HTML Template</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
 
      <!-- Bootstrap core CSS-->
      <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      @if (Auth::user())
      @if (Auth::user()->theme == 'dark')
        <link href="{{asset('assets/css/osahan.css')}}" rel="stylesheet">
      @else 
        <link href="{{asset('assets/css/dark.css')}}" rel="stylesheet">
      @endif
    @else
      <link href="{{asset('assets/css/osahan.css')}}" rel="stylesheet">
    @endif
      <link href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.theme.css')}}">
      <link rel="stylesheet" href="{{asset('js/app.js')}}">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
  
  
      <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
      </style>
   </head>
   <body id="page-top">
      <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
         &nbsp;&nbsp; 
         <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
         <i class="fas fa-bars"></i>
         </button> &nbsp;&nbsp;
         <a class="navbar-brand mr-1" href="{{route('index')}}"><img class="img-fluid" alt="" src="{{asset('assets/img/logo.png')}}"></a>
         <!-- Navbar Search -->
         <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search">
            <div class="input-group">
               <input type="text" class="form-control" placeholder="Search for...">
               <div class="input-group-append">
                  <button class="btn btn-light" type="button">
                  <i class="fas fa-search"></i> 
                  </button>
               </div>
            </div>
         </form>
         @if(Auth::user())
         <label class="switch">
  <input type="checkbox" id="mode">
  <span class="slider round"></span>
</label>
@endif
         <!-- Navbar -->
         <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
            <li class="nav-item mx-1">
               <a class="nav-link" href="{{route('upload.video')}}">
               <i class="fas fa-plus-circle fa-fw"></i>
               Upload Video
               </a>
            </li>

            <!-- <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
               <span class="badge badge-danger">9+</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Something else here</a>
               </div>
            </li> -->
            <!-- <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-envelope fa-fw"></i>
               <span class="badge badge-success">7</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Something else here</a>
               </div>
            </li> -->
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
               <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  @if(Auth::user())
               @if(!empty(\App\Models\Profile::profile_image()))
                     <img alt="Avatar" src="{{asset('storage'.\App\Models\Profile::profile_image()->image)}}"> 
              @else
                     <img alt="Avatar" src="{{asset('assets/img/dummy.png')}}"> 
              @endif
              @endif
         @if(Auth::user())
              {{ Auth::user()->name }}
         @endif
               </a>
               @if(Auth::user())
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{route('user.profile',Auth::user()->id)}}"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Account</a>
                  <!-- <a class="dropdown-item" href="subscriptions.html"><i class="fas fa-fw fa-video"></i> &nbsp; Subscriptions</a> -->
                  <a class="dropdown-item" href="{{route('setting',Auth::user()->id)}}"><i class="fas fa-fw fa-cog"></i> &nbsp; Settings</a> 
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                     <i class="fas fa-fw fa-sign-out-alt"></i> &nbsp;    {{ __('Logout') }}</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                     </form>
               </div>
               @endif
            </li>
         </ul>
      </nav>
      <div id="wrapper">
         <!-- Sidebar -->
         @include('layouts.dashboard.components.sidebar')
         <div id="content-wrapper" style="margin-left: 189px;">
            <div class="container-fluid" >
             @yield('content')
            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            <footer class="sticky-footer">
               <div class="container">
                  <div class="row no-gutters">
                     <div class="col-lg-6 col-sm-6">
                        <p class="mt-1 mb-0">&copy; Copyright 2018 <strong class="text-dark">Vidoe</strong>. All Rights Reserved<br>
                           <small class="mt-0 mb-0">Made with <i class="fas fa-heart text-danger"></i> by <a class="text-primary" target="_blank" href="https://askbootstrap.com/">Ask Bootstrap</a>
                           </small>
                        </p>
                     </div>
                     <div class="col-lg-6 col-sm-6 text-right">
                        <div class="app">
                           <a href="#"><img alt="" src="img/google.png"></a>
                           <a href="#"><img alt="" src="img/apple.png"></a>
                        </div>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <!-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.html">Logout</a>
               </div>
            </div>
         </div>
      </div> -->
      <!-- Bootstrap core JavaScript-->
      <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/app.js')}}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
      <!-- Owl Carousel -->
      <script src="{{asset('assets/vendor/owl-carousel/owl.carousel.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('assets/js/custom.js')}}"></script>
      <script src="{{asset('assets/js/custom.js')}}"></script>
      <script src="{{asset('assets/js/select2.js')}}"></script>
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
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
               $("#usertable").DataTable();
            var APP_URL = {!! json_encode(url('/')) !!}
            $("#mode").on('change',function(){
               if (this.checked) {

                  $.ajax({
                     type:'POST',
                url:'/theme',
                data:{_token: "{{ csrf_token() }}", theme:'light'},
                success:function(msg){

                  location.reload(); 

                }
                  })
                 
                 
               }
           
            })



         })
      </script>
      @yield('script')
   </body>
</html>