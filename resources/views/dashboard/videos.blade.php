@extends('layouts.dashboard.app')
@section('content')
<div class="container-fluid">
<div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                       <h4>Videos</h4>
                     </div>
                     @forelse ($videos as $video)
                     <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="category-item mt-0 mb-0">
                           <a href="shop.html">
                              <img class="img-fluid" src="{{asset('storage'.$video->thumbnail)}}" alt="">
                              <h6>{{$video->title}} <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></h6>
                              <p>74,853 views</p>

                           </a>
                           <div class="channels-view">
                              <a href="{{route('admin.show',$video->id)}}">
                              <i class="fas fa-eye"></i>
                              </a>
                              <a  href="{{route('admin.delete',$video->id)}}">
                               <i class="fas fa-trash"></i>
                              </a>

                           </div>
                        </div>
                     </div>
                     @empty

                     @endforelse


                  </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            {!! $videos->links() !!}
                        </div>
                    </div>
{{--                  <nav aria-label="Page navigation example">--}}
{{--                     <ul class="pagination justify-content-center pagination-sm mb-0">--}}
{{--                        <li class="page-item disabled">--}}
{{--                           <a class="page-link" href="#" tabindex="-1">Previous</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                           <a class="page-link" href="#">Next</a>--}}
{{--                        </li>--}}
{{--                     </ul>--}}
{{--                  </nav>--}}
               </div>
</div>
@endsection
@section('script')
 <script>
    $(document).ready(function(){

    })
 </script>
@endsection
