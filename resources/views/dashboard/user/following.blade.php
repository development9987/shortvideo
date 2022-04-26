@extends('layouts.dashboard.app')
@section('content')
<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                          
                           <hr>
                           <h6>Followings</h6>
                           <hr>
                        </div>
                     </div>
                     @forelse ($followings as $following)
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                              <a href="#"><img class="img-fluid" src="{{asset('storage'.$following->image)}}" alt=""></a>
                              <!-- <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div> -->
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="{{route('user.profile',$following->following)}}">{{$following->name}}</a>
                              </div>
                              <!-- <div class="channels-view">
                                 382,323 subscribers
                              </div> -->
                           </div>
                        </div>
                     </div>
                     @empty
                        <h4>No Following Yet</h4>
                     @endforelse
              
                  
              
              
                  </div>
                 
               </div>
               <hr>
           
            </div>
     
         </div>
@endsection