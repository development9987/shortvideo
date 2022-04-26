@extends('layouts.dashboard.app')
@section('content')
<div class="row">
                  <div class="col-lg-12">
                     <div class="osahan-form">
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e1">Video Title</label>
                                 <input type="text" placeholder="" id="e1" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e2">About</label>
                                 <textarea rows="3" id="e2" name="e2" class="form-control">Description</textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group">
                                 <label for="e1">Video</label>
                                 <input type="text" placeholder="" id="e1" class="form-control">
                              </div>
                           </div>
                           <div class="col-lg-12">
                              <div class="form-group">
                                <label for="e2">Tags</label>
                                <select class="form-control" id="tags" name="tags[]" multiple>
                                        
                                </select>
                              </div>
                           </div>
                        </div>
                  
                     
                     </div>
                     <div class="osahan-area text-center mt-3">
                        <button class="btn btn-outline-primary">Save Changes</button>
                     </div>
                     <hr>
                  
                  </div>
               </div>
@endsection
@section('script')
<script>
     $("#tags").select2({tags:["red", "green", "blue"]});
</script>
@endsection