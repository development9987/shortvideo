@extends('layouts.dashboard.app')
@section('content')
<div class="col-md-12">
<hr>
    <table id="exampleTable" class="table table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>#Tags</th>
        </tr>
        </thead>
        <tbody>
 
        @foreach($videotags as $key => $videotag) 
            @foreach ($videotag as $tag)
            <tr>
                <td> <a href="{{route('tag.video',preg_replace('/[^a-zA-Z0-9_ %\.\(\)%&-]/s', '', $tag))}}" class="tag" style="background: {{sprintf("#%06x",rand(0,16777215))}}" >#{{ preg_replace('/[^a-zA-Z0-9_ %\.\(\)%&-]/s', '', $tag) }}</a></td>
            </tr>
              
            @endforeach
        @endforeach 
        </tbody>
    </table>
<hr>
</div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#exampleTable').DataTable();
        });
    </script>
@endsection
