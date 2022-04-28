@extends('layouts.dashboard.app')
@section('content')
<div class="container-fluid pb-0">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="single-video-left">
                           <div class="single-video">
                              <iframe width="100%" height="315" src="{{asset('storage/'.$video->video_url)}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                           </div>
                           <div class="single-video-title box mb-3">
                              <h2><a href="#">{{$video->title}}.</a></h2>
                              <p class="mb-0"><i class="fas fa-eye"></i> {{$video->views}} views</p>
                           </div>
                           <div class="single-video-author box mb-3">
                             <div class="float-right">
                                 <!-- <button class="btn btn-danger" type="button">Delete <strong></strong></button>  -->
                             <!-- <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i></button> -->
                            </div>
                              <!-- <img class="img-fluid" src="img/s4.png" alt="">
                              <p><a href="#"><strong>Osahan Channel</strong></a> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></p>
                              <small>Published on Aug 10, 2018</small> -->
                           </div>
                           <div class="single-video-info-content box mb-3">
                              <!-- <h6>Cast:</h6>
                              <p>Nathan Drake , Victor Sullivan , Sam Drake , Elena Fisher</p>
                              <h6>Category :</h6>
                              <p>Gaming , PS4 Exclusive , Gameplay , 1080p</p> -->
                              <h6>About :</h6>
                              <p>{{$video->description}} </p>
                              <h6>Tags :</h6>
                              <p class="tags mb-0">
                                  @foreach($videotags as $tag)
                                 <span><a href="#">{{$tag}}</a></span>
                                 @endforeach
                              </p>
                           </div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
@endsection
