<ul class="sidebar navbar-nav">
@if(Auth::user())
   @if (Auth::user()->role == 'admin')
   <li class="nav-item active">
               <a class="nav-link" href="{{route('user.profile',Auth::user()->id)}}">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('upload.request')}}">
               <i class="fas fa-fw fa-user-alt"></i>
               <span>Upload Request</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('admin.videos')}}">
               <i class="fas fa-fw fa-users"></i>
               <span>Videos</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('admin.tags')}}">
               <i class="fas fa-fw fa-user-alt"></i>
               <span>Tags</span>
               </a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link" href="video-page.html">
               <i class="fas fa-fw fa-video"></i>
               <span>Video Page</span>
               </a>
            </li> -->
            <li class="nav-item">
               <a class="nav-link" href="{{route('admin.users')}}">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>User</span>
               </a>
            </li>
            <!-- <li class="nav-item dropdown">
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
            </li> -->
            <!-- <li class="nav-item">
               <a class="nav-link" href="history-page.html">
               <i class="fas fa-fw fa-history"></i>
               <span>History Page</span>
               </a>
            </li> -->
            <!-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-list-alt"></i>
               <span>Categories</span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="categories.html">Movie</a>
                  <a class="dropdown-item" href="categories.html">Music</a>
                  <a class="dropdown-item" href="categories.html">Television</a>
               </div>
            </li> -->
    
     
   @else
            <li class="nav-item active">
               <a class="nav-link" href="{{route('index')}}">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('users.videos',Auth::user()->id)}}">
               <i class="fas fa-fw fa-users"></i>
               <span>Videos</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('users.follower',Auth::user()->id)}}">
               <i class="fas fa-fw fa-users"></i>
               <span>Followers</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('users.following',Auth::user()->id)}}">
               <i class="fas fa-fw fa-users"></i>
               <span>Followings</span>
               </a>
            </li>
            <!-- <li class="nav-item">
               <a class="nav-link" href="#">
               <i class="fas fa-fw fa-user-alt"></i>
               <span>Tags</span>
               </a>
            </li> -->
            <li class="nav-item">
               <a class="nav-link" href="{{route('upload.video')}}">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>Upload Video</span>
               </a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="{{route('create.gallery')}}">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>Gallery</span>
               </a>
            </li>
            <!-- <li class="nav-item dropdown">
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
            </li> -->
            <!-- <li class="nav-item">
               <a class="nav-link" href="history-page.html">
               <i class="fas fa-fw fa-history"></i>
               <span>History Page</span>
               </a>
            </li> -->
            <!-- <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-list-alt"></i>
               <span>Categories</span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="categories.html">Movie</a>
                  <a class="dropdown-item" href="categories.html">Music</a>
                  <a class="dropdown-item" href="categories.html">Television</a>
               </div>
            </li> -->
            <!-- <li class="nav-item channel-sidebar-list">
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
            </li> -->
   @endif
   @endif
          
         </ul>