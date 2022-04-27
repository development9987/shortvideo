@extends('layouts.dashboard.app')
@section('content')
<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                          
                           <hr>
                           <h6>Followers</h6>
                           <hr>
                        </div>
                     </div>
                     @forelse ($followers as $follower)
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">

                              
               @if(!empty($follower->image))
                  <a href="#"><img class="img-fluid" src="{{asset('storage'.$follower->image)}}" alt=""></a>
              @else
               <img alt="Avatar" src="{{asset('assets/img/dummy.png')}}"> 
              @endif
                              <!-- <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div> -->
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="{{route('user.profile',$follower->follow)}}">{{$follower->name}}</a>
                                 
                              </div>
                              <!-- <div class="channels-view">
                                 
                              </div> -->
                           </div>
                        </div>
                     </div>
                     @empty
                        <h4>No Follower </h4>
                     @endforelse
                   
                  
              
              
                  </div>
                 
               </div>
               <hr>
           
            </div>
     
         </div>
@endsection