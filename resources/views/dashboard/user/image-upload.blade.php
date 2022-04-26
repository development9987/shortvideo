@extends('layouts.dashboard.app')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid pb-0">
    <div class="video-block section-padding"> <!-- Video section start-->
    <div class="col-md-12">
                        <div class="main-title">
                          
                           <hr>
                           <h6>Create Gallery</h6>
                           <hr>
                        </div>
                     </div>
          <div class="row revrs">
             <div class="col-md-12">
    <form method="post" action="{{route('upload.gallery')}}" enctype="multipart/form-data" 
                  class="dropzone" id="dropzone">
    @csrf
    
</form>
</div>
</div>
</div>
<div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                         
                           <h6>Categories</h6>
                        </div>
                     </div>
                     @forelse ($images as $image)
                     <div class="col-xl-3 col-sm-6 mb-3">
                     <img class="img-fluid" src="{{asset('images/'.$image->filename)}}" alt="">
                        <div class="category-item mt-0 mb-0">
                     
                           <button href="shop.html" class="btn btn-primary dltImageBtn" data-image="{{$image->filename}}">
                              
                             <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Delete"><i class="fas fa-trash"></i></span>
                              <!-- <p>74,853 views</p> -->
</button>
                        </div>
                     </div> 
                     @empty
                         
                     @endforelse
                   
                   
                  
                  </div>
              
               </div>
    </div>
</div>
@endsection
@section('script')
<script>



$(document).ready(function(){
    $(".dltImageBtn").on('click',function(){
        var image = $(this).data('image');
        $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("image/delete") }}',
                    data: {_token: "{{ csrf_token() }}",filename: image},
                    success:function(img){

                        
                        location.reload();

                    },
                    error: function(file, response){
                        return false;
                    }
                })


    })
})
          Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            removedfile: function(file) 
            {
                var name = file.upload.filename;
                $.ajax({
                    headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                    type: 'POST',
                    url: '{{ url("upload/gallery") }}',
                    data: {filename: name},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ? 
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
       
            success: function(file, response) 
            {
                location.reload();
            },
            error: function(file, response)
            {
               return false;
            }
};
</script>
@endsection