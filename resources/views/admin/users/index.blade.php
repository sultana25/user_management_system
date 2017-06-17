@extends('layouts.admin')




@section('content')

    <h1>User</h1>
    
    @if(Session::has('deleted_user'))
   
       <p class="bg-danger">{{session('deleted_user')}}</p>
   
    @endif
<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>NamePhoto</th>        
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Create</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>
     @if($users)
     @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
        <td><img height="50" src="{{$user->photo?$user->photo->file:'http://placehold.it'}}" alt=""></td>
        <td>{{$user->email}}</td>
        <td>{{$user->role->name}}</td>
          <td>{{$user->is_active == 1?'Active':'Not active'}}</td>  
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      
      @endforeach
      @endif
   
      
     
    </tbody>
  </table>

@stop