@extends('layouts.admin')


@section('content')

    <h1>Posts</h1>
    <table class="table">
        <thead>
            <tr>
                <th>User</th>
                <th>Photo</th>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created</th>
                <th>Updated</th>
                

                
            </tr>
        </thead>
        <tbody>
           @if($posts)
           @foreach($posts as $post)
           
            <tr>
                <td>{{$post->user->name}}</td>
                <td> <img height="50" src="{{$post->photo_id?$post->photo->file:'http://placehold.it'}}" alt=""></td>
                <td>{{$post->category?$post->category->name:'Uncategorized'}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>
            
            
            @endforeach
            @endif
        </tbody>
    </table>
@stop