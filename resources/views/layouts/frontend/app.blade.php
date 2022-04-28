<!DOCTYPE html>
<html lang="en">
 @include('layouts.frontend.partials.head')
   <body id="page-top">
   @include('layouts.frontend.partials.nav')
      <!-- Mobile Nav -->
      <div class="desk-non">
         <header>
            <div class="row mynavs">
               <div class="logo">
                  <p>[LOGO HERE]</p>
               </div>
               <div class="toggle-btnz">
                  <span></span>
               </div>
            </div>
         </header>

         <div class="navz-container">
            <div class="navz-bar">
               <div class="nav-head">
                  <div class="row dflex p-2">
                     <div class="col-6">
                        <p>[LOGO HERE]</p>
                     </div>
                     <div class="col-6">
                         <!-- <div class="dropdown">
                                    <button style="background: linear-gradient(135deg, #2b2c2c 10%,#060505 100%);" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       <i class="fas fa-heart fa-fw"></i>
                                       HTML
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      <a class="dropdown-item" href="#">Ipsum</a>
                                      <a class="dropdown-item" href="#">Dolor</a>
                                      <a class="dropdown-item" href="#">Amet</a>
                                    </div>
                                  </div> -->
                     </div>
                  </div>
               </div>
               <div class="nav-body">
                  <ul>
                     <li> <i class="fas fa-fw fa-search" id='toggle-search'></i> Search </li>
                     <form action="{{route('search.video')}}" method="post">
                        @csrf
                     <input style='display:none;' id='searchBar' type="text" name="str" placeholder='Search&hellip;'>
                     </form>

                     <!-- <li><span><input class="form-control" name="search" ><i class="fas fa-search"></i></span></li> -->
                     <!-- <li> <a href=""> <i class="fas fa-fw fa-list"></i> Categories </a></li>
                     <li> <a href="#"> <i class="fas fa-fw fa-hashtag"></i> Discover </a></li> -->
                     <li> <a href="{{route('upload.video')}}"> <i class="fas fa-fw fa-plus-circle"></i> Upload Video </a></li>
                  </ul>

                  <div class="btn-lgn">
                  @guest
            @if (Route::has('login'))
            <li class="nav-item active">
               <a href="{{ route('login') }}"> <i class="fas fa-fw fa-user"></i> {{ __('Login') }}   </a>
            </li>
            @endif
            @else
            {{ Auth::user()->name }}
            @endguest

                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- End Mobile Nav -->

      <div id="wrapper">
         <!-- Sidebar -->
         <!-- <ul class="sidebar navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="index.html">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="channels.html">
               <i class="fas fa-fw fa-users"></i>
               <span>Channels</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="single-channel.html">
               <i class="fas fa-fw fa-user-alt"></i>
               <span>Single Channel</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="video-page.html">
               <i class="fas fa-fw fa-video"></i>
               <span>Video Page</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="upload-video.html">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>Upload Video</span>
               </a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-folder"></i>
               <span>Pages</span>
               </a>
               <div class="dropdown-menu">
                  <h6 class="dropdown-header">Login Screens:</h6>
                  <a class="dropdown-item" href="login.html">Login</a>
                  <a class="dropdown-item" href="register.html">Register</a>
                  <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
                  <div class="dropdown-divider"></div>
                  <h6 class="dropdown-header">Other Pages:</h6>
                  <a class="dropdown-item" href="404.html">404 Page</a>
                  <a class="dropdown-item" href="blank.html">Blank Page</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="history-page.html">
               <i class="fas fa-fw fa-history"></i>
               <span>History Page</span>
               </a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-list-alt"></i>
               <span>Categories</span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="categories.html">Movie</a>
                  <a class="dropdown-item" href="categories.html">Music</a>
                  <a class="dropdown-item" href="categories.html">Television</a>
               </div>
            </li>
            <li class="nav-item channel-sidebar-list">
               <h6>SUBSCRIPTIONS</h6>
               <ul>
                  <li>
                     <a href="subscriptions.html">
                     <img class="img-fluid" alt="" src="img/s1.png"> Your Life
                     </a>
                  </li>
                  <li>
                     <a href="subscriptions.html">
                     <img class="img-fluid" alt="" src="img/s2.png"> Unboxing  <span class="badge badge-warning">2</span>
                     </a>
                  </li>
                  <li>
                     <a href="subscriptions.html">
                     <img class="img-fluid" alt="" src="img/s3.png"> Product / Service
                     </a>
                  </li>
                  <li>
                     <a href="subscriptions.html">
                     <img class="img-fluid" alt="" src="img/s4.png">  Gaming
                     </a>
                  </li>
               </ul>
            </li>
         </ul> -->
         <div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="top-mobile-search  mbd-none">
                  <div class="row">
                     <div class="col-md-12">
                        <form class="mobile-search">
                           <div class="input-group">
                             <input type="text" placeholder="Search for..." class="form-control">
                               <div class="input-group-append">
                                 <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                               </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <!-- <div class="main-title">
                           <div class="btn-group float-right right-action">
                              <a href="#" class="right-action-link text-gray" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                              </a>
                              <div class="dropdown-menu dropdown-menu-right">
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star"></i> &nbsp; Top Rated</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-signal"></i> &nbsp; Viewed</a>
                                 <a class="dropdown-item" href="#"><i class="fas fa-fw fa-times-circle"></i> &nbsp; Close</a>
                              </div>
                           </div>
                           <h6>Channels Categories</h6>
                        </div> -->
                     </div>
                     <div class="col-md-12">
                        <!-- <div class="owl-carousel owl-carousel-category">
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s1.png" alt="">
                                    <h6>Your Life</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s2.png" alt="">
                                    <h6>Unboxing Cool</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s3.png" alt="">
                                    <h6>Service Reviewing</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s4.png" alt="">
                                    <h6>Gaming <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s5.png" alt="">
                                    <h6>Technology Tutorials</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s6.png" alt="">
                                    <h6>Singing</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s7.png" alt="">
                                    <h6>Cooking</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s8.png" alt="">
                                    <h6>Traveling</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s1.png" alt="">
                                    <h6>Education</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s2.png" alt="">
                                    <h6>Noodles, Sauces & Instant Food</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s3.png" alt="">
                                    <h6>Comedy <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                           <div class="item">
                              <div class="category-item">
                                 <a href="#">
                                    <img class="img-fluid" src="img/s4.png" alt="">
                                    <h6>Lifestyle Advice</h6>
                                    <p>74,853 views</p>
                                 </a>
                              </div>
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
               <hr>
               <div class="video-block section-padding"> <!-- Video section start-->

                  <div class="row revrs">
                    @yield('content')
                  </div>
               </div>
               <hr class="mt-0">

            </div>
            <!-- /.container-fluid -->
            <!-- Sticky Footer -->
            @include('layouts.frontend.partials.footer')
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>

      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <!-- Core plugin JavaScript-->
      <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
      <!-- Owl Carousel -->
      <script src="{{asset('assets/vendor/owl-carousel/owl.carousel.js')}}"></script>
      <!-- Custom scripts for all pages-->
      <script src="{{asset('assets/js/custom.js')}}"></script>

      <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>

      <script>
         const videos = document.querySelectorAll('video');

         // for (const video of videos) {
         //   video.addEventListener('click', function () {
         //     console.log('clicked');
         //     if (video.paused) {
         //       video.play();
         //     } else {
         //       video.pause();
         //     }
         //   });
         // }
         $(document).ready(function(){

            // Search Bar & Toggle
$('#toggle-search').on('click', function() {
  $('#searchBar').toggle('display: inline-block');
});

            {{--var APP_URL = {!! json_encode(url('/')) !!}--}}
            $("#mode").on('change',function(){

                if (this.checked) {
                    var themeType = 'light';
                }else {
                    var themeType = 'dark';
                }

               $.ajax({
                type:'POST',
                url:'/theme',
                data:{_token: "{{ csrf_token() }}", theme:'light'},
                success:function(msg){

                  // window.location.href = APP_URL;
                    location.reload();

                }
                  })


            })



         })
       </script>
       @yield('scripts')
   </body>
</html>
