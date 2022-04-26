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
        @foreach($tags as $tag)
            @php
                $data = json_decode($tag);
                $taglist = implode(',',$data);
            @endphp

            <tr>
                <td>{{$taglist}}</td>
            </tr>
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
