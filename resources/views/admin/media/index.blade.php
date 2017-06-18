@extends('layout.admin')


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
                        <td>{{$photo->file}}</td>
                        <td>{{$photo->created_at?$photo->created_at:'No date'}}</td>
                    </tr>
                </tbody>
            @endforeach
        @endif
    </table>
@stop