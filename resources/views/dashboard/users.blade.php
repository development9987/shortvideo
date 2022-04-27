@extends('layouts.dashboard.app')
@section('content')
<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                          
                           <hr>
                           <h6>Users</h6>
                           <hr>
                        </div>
                     </div>
                     @if (Session::has('message'))
                     {{Session::get('message')}}                     
                  @endif
                    @forelse ($users as $user)
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="channels-card">
                           <div class="channels-card-image">
                           @if(empty($user->profile))
                                 <img alt="Avatar" src="{{asset('assets/img/dummy.png')}}">
                           @else
                                          <img alt="Avatar" src="{{asset('storage'.$user->profile->image)}}">
                           @endif
                              <!-- <div class="channels-card-image-btn"><button type="button" class="btn btn-outline-danger btn-sm">Subscribe <strong>1.4M</strong></button></div> -->
                           </div>
                           <div class="channels-card-body">
                              <div class="channels-title">
                                 <a href="{{route('user.profile',$user->id)}}">{{$user->name}}</a>
                              </div>
                              <div class="channels-view">
                                 {{count($user->followers)}} Followers
                              </div>
                              <div class="channels-view">
                              <a href="{{route('show.user',$user->id)}}">
                              <i class="fas fa-eye"></i>
                              </a>
                              <a  href="{{route('delete.user',$user->id)}}">
                               <i class="fas fa-trash"></i>
                              </a>
                                
                           </div>
                           </div>
                        </div>
                     </div>
                    @empty
                         <h3>No User Found</h3>
                    @endforelse
                    
              
                  </div>
                 
               </div>
               <hr>
           
            </div>
     
         </div>
@endsection