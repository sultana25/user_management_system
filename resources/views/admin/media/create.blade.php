@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.css" class="style">
@stop
@section('content')
    <h1>Upload Media</h1>
    <div class="form-group">
        {!!Form::open(['method'=>'POST','action'=>'AdminMediaController@store','class'=>'dropzone'])!!}
        {!!Form::close()!!}
    </div>

@stop


@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.0/min/dropzone.min.js"></script>
@stop