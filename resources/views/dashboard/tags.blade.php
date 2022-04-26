@extends('layouts.dashboard.app')
@section('content')
<div class="col-md-12">
<hr>  
    @foreach($tags as $tag)
   @php 
   $data = json_decode($tag);
   $taglist = implode(',',$data);
  

    @endphp 
        <a href="" class="btn btn-primary border-none" style="margin-bottom:10px">{{$taglist}}</a>&nbsp&nbsp
    @endforeach
<hr>                   
</div>
@endsection