@extends('layouts.dashboard.app')
@section('content')
<div id="content-wrapper">

            <div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Update Password</h6>
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
                     <div class="col-sm-12 text-right">
                        
                        <button type="submit" class="btn btn-success border-none"> Update </button>
                     </div>
                  </div>
               </form>
            </div>
    
         </div>
@endsection