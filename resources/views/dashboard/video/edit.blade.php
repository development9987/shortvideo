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
                        
                        <!-- <div class="row">
                              <div class="col-lg-12"> -->
                                 @if(!empty($video))
                              <video class="video__player imgplace" src="{{asset('storage'.$video->video_url)}}" ></video>
                              @endif
                              <!-- </div>
                        </div> -->
                
                     </div>
                     <!-- <div class="col-lg-10">
                        <div class="osahan-title">Contrary to popular belief, Lorem Ipsum (2019) is not.</div>
                        <div class="osahan-size">102.6 MB . 2:13 MIN Remaining</div>
                        <div class="osahan-progress">
                           <div class="progress">
                              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75"   aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                           </div>
                           <div class="osahan-close">
                              <a href="#"><i class="fas fa-times-circle"></i></a>
                           </div>
                        </div>
                        <div class="osahan-desc">Your Video is still uploading, please keep this page open until it's done.</div>
                     </div> -->
                  </div>
                  <hr>
                  <div class="row">
                  @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                  @endif
                  @if (Session::has('upload_success'))
                     {{Session::get('upload_success')}}                     
                  @endif
                  @if(!empty($video))
                     <div class="col-lg-12">
                         <form action="{{route('update.video',$video->id)}}" method="post" enctype="multipart/form-data"> 

                         @csrf
                        <div class="osahan-form">
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="e1">Video Title</label>
                                    <input type="text" placeholder="" id="e1" value="{{$video->title}}" name="title" class="form-control">
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="e2">About</label>
                                    <textarea rows="3" id="e2"  class="form-control" name="description">{{$video->description}}</textarea>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="e2">video</label>
                                    <input type="file" id="file" name="file" class="form-control">
                                    <input type="hidden" name="old_file" value="{{$video->video_url}}">
                                    <input type="hidden" name="thumbnail" value="{{$video->thumbnail}}">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                           
                           </div>
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="e7">Tags (13 Tags Remaining)</label>
                                    @php $tags =  json_decode($video->tags) @endphp
                                    <select class="form-control" id="tags" name="tags[]"  multiple>
                                       @foreach($tags as $tag)
                                        <option value="{{$tag}}" selected>{{$tag}}</option>
                                        @endforeach
                                    </select>
                                 </div>
                              </div>
                 
                           </div>
                        
                        </div>
                      

                        <div class="osahan-area text-center mt-3">
                           <button class="btn btn-outline-primary" type="submit">Update Changes</button>
                        </div>

                         </form>
                        <hr>
                  
                     </div>
                  @endif
                  </div>
               </div>
@endsection
@section('script')
<script>
   
     $("#tags").select2({
    tags: true,
   
})
</script>
@endsection