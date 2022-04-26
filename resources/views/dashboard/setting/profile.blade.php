@extends('layouts.dashboard.app')
@section('content')
<div id="content-wrapper">

            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Settings</h6>
                     </div>
                  </div>
               </div>
               <form method="POST" action="{{route('setting.profile')}}" enctype="multipart/form-data">
                   @csrf
                  <div class="row">
                   
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">City <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="city" value="{{ !empty($profile->city) ? $profile->city  : ''}}  "  type="text">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">State<span class="required">*</span></label>
                           <input class="form-control border-form-control"  value="{{!empty($profile->state) ? $profile->state  : ''}}" name="state" type="text">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Country <span class="required"></span></label>
                           <input class="form-control border-form-control " value="{{ !empty($profile->country) ? $profile->country  : ''}}" name="country" type="text">
                        </div>
                     </div>
                  </div>
                
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label class="control-label">Address <span class="required"></span></label>
                           <textarea class="form-control border-form-control" name="address">{!! !empty($profile->address) ? $profile->address  : '' !!}</textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                           <label class="control-label">Profile Picture <span class="required"></span></label>
                           <input class="form-control border-form-control" type="file" name="image">
                           @if(!empty($profile->image))
                           <input class="form-control border-form-control" type="hidden" value="{{!empty($profile->image) ? $profile->image  : ''}}"  name="old_image">
                           @endif
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group">
                        @if(!empty($profile->image))
                           <img style="width:100px" src="{{asset('storage'.$profile->image)}}">
                        @endif
                
                        </div>
                     </div>
                  </div>
                  

                  <div class="row">
                     <div class="col-sm-12 text-right">
                        
                        <button type="submit" class="btn btn-success border-none"> Save Changes </button>
                     </div>
                  </div>
               </form>
            </div>
    
         </div>
         <div id="content-wrapper">
              @if(Session::has('message'))
                 {{Session::get('message')}}
              @endif
            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Update Password</h6>
                     </div>
                  </div>
               </div>
               <form method="POST" action="{{route('setting.password',Auth::user()->id)}}" enctype="multipart/form-data">
                   @csrf
           
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Password<span class="required">*</span></label>
                           <input class="form-control border-form-control"  value="" name="password" type="password">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Confirm Password<span class="required"></span></label>
                           <input class="form-control border-form-control " value="" name="password_confirmation" type="password">
                        </div>
                     </div>
                  </div>
                 
                  

                  <div class="row">
                     <div class="col-sm-12 text-right">
                        
                        <button type="submit" class="btn btn-success border-none"> Change Password </button>
                     </div>
                  </div>
               </form>
            </div>
    
         </div>

@endsection