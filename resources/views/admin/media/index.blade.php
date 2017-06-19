@extends('layouts.admin')


@section('content')

    <table class="table">
       
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created Date</th>
            </tr>
        </thead>
        @if($photos)
            @foreach($photos as $photo)
                <tbody>
                    <tr>
                        <td>{{$photo->id}}</td>
                        <td><img height="50" src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at->diffForHumans()}}</td>
                        <td>
                            {!!Form::open(['method'=>'DELETE','action'=>['AdminMediaController@destroy',$photo->id]])!!}
                            <div class="form-group">
                                {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                            </div>
                            {!!Form::close()!!}
                        </td>
                    </tr>
                </tbody>
            @endforeach
        @endif
    </table>
@stop