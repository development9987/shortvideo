<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>Testing Short Video Html</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">
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
  
     
      <!-- <link href="{{asset('assets/css/dark.css')}}" rel="stylesheet"> -->
      <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('assets/css/new.css')}}" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.carousel.css')}}">
      <link rel="stylesheet" href="{{asset('assets/vendor/owl-carousel/owl.theme.css')}}">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
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
      @yield('style')
</head>