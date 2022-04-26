@extends('layouts.dashboard.app')
@section('content')

<div class="container-fluid upload-details">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="main-title">
                        <h6>Upload Details</h6>
                     </div>
                  </div>
                  <div class="col-lg-2">
                @if(empty($user->profile))
                <img alt="Avatar" src="{{asset('assets/img/user.png')}}">
                @else
                <img class="imgplace" src="{{asset('storage'.$user->profile->image)}}">
                @endif
                    
                  </div>
              
               </div>
               <hr>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e1">
                                    <label> User Name </label>
                                 <input type="text" disabled value="{{$user->name}}" class="form-control">
                              </div>
                           </div>
                           <!-- <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e2">About</label>
                                 <textarea rows="3" id="e2" name="e2" class="form-control">Description</textarea>
                              </div>
                           </div> -->
                        </div>
                        
                     
                     
                     </div>
                   
                     <hr>
            
                  </div>
               </div>
            </div>
        

@endsection