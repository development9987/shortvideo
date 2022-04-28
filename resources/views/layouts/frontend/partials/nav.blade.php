<nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top mbd-none">


        @auth
            @if(Auth::user()->theme == 'dark')
                 <a class="navbar-brand mr-1" href="{{route('index')}}"><img class="img-fluid" alt="" src="{{asset('assets/img/logo.png')}}"></a>
            @else
            <a class="navbar-brand mr-1" href="{{route('index')}}"><img class="img-fluid" alt="" src="{{asset('assets/img/logo-dark.png')}}"></a>
            @endif
        @else
            <a class="navbar-brand mr-1" href="{{route('index')}}"><img class="img-fluid" alt="" src="{{asset('assets/img/logo.png')}}"></a>
        @endauth
         <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent" style="justify-content: center;">
            <ul class="navbar-nav" style="margin-left: 20%;">
              <li class="nav-item active">
                <a class="nav-link" href="#">
                  <i class="far fa-compass"></i>
                  Feed
                  </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <i class="fas fa-hashtag fa-fw"></i>
                  explore
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pages
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Page 1</a>
                  <a class="dropdown-item" href="#">Page 2</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Page Layout</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
         </div> -->
         <!-- Navbar Search -->
         <form method="post" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-5 my-2 my-md-0 osahan-navbar-search" action="{{route('search.video')}}">
            @csrf
            <div class="input-group">
               <input type="text" name="str" class="form-control" placeholder="Search for...">
               <div class="input-group-append">
                  <button class="btn btn-light" type="submit">
                  <i class="fas fa-search"></i>
                  </button>
               </div>
            </div>
         </form>
         <!-- Navbar -->
         @if(Auth::user())
         <label class="switch">
  <input type="checkbox" {{Auth::user()->theme == 'light' ? 'checked' : ''}} id="mode">
  <span class="slider round"></span>
</label>
@endif
         <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
            <li class="nav-item mx-1">
               <a class="nav-link" href="{{route('upload.video')}}">
               <i class="fas fa-plus-circle fa-fw"></i>
               Upload Video
               </a>
            </li>
            @if (Auth::user())
         <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
               <span class="badge badge-danger">{{Auth::user()->unreadNotifications()->count()}}</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                  <!-- <a class="dropdown-item" href="#"><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div> -->
                  @php
                     $notifies = App\Models\User::notification(Auth::user()->id)
                  @endphp
                  @foreach ($notifies as $notification)
                        <a class="dropdown-item" href="#" > {!! preg_replace('/[^a-zA-Z0-9_ %\.\(\)%&-]/s', '', json_encode($notification->data))  !!}</a>
                  @endforeach
               </div>
            </li>
            @endif
           <!-- <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-envelope fa-fw"></i>
               <span class="badge badge-success">7</span>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                  <a class="dropdown-item" href=""><i class="fas fa-fw fa-edit "></i> &nbsp; Action</a>
                  <a class="dropdown-item" href="#"><i class="fas fa-fw fa-headphones-alt "></i> &nbsp; Another action</a>
                  <div class="dropdown-divider"></div>
                  <!-- <a class="dropdown-item" href="#"><i class="fas fa-fw fa-star "></i> &nbsp; Something else here</a> -->
               <!-- </div>
            </li> -->
            @guest
            @if (Route::has('login'))
            <li class="nav-item active">

            <a class="nav-link" href="{{ route('login') }}">
            {{ __('Login') }}
            </a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">

               <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

               @if(empty($user->profile->image))
                                          <img alt="Avatar" src="{{asset('assets/img/dummy.png')}}">
                                          @else
                                          <img alt="Avatar" src="{{asset('storage'.$user->profile->image)}}">
                                          @endif


               {{ Auth::user()->name }}
               </a>


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
            </li>
            @endguest

         </ul>
      </nav>
