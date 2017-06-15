@extends('layouts.admin')


@section('content')

    <h1>Edit User</h1>
    <div class="row">
    
     @include('includes.form_errors')
    
    </div>
    <div class="row">
    
         <div class="col-sm-3">
             <img  src="{{$user->photo?$user->photo->file:'http://placehold.it'}}" alt="" class="img-responsive img-rounded">
         </div>

         <div class="com-sm-9">
            {!!Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=>true])!!}
        <div class="form-group">
            {!!Form::label('name','Name:')!!}
            {!!Form::text('name',null,['class'=>'form-control'])!!}

        </div>
         <div class="form-group">
            {!!Form::label('email','Email:')!!}
            {!!Form::email('email',null,['class'=>'form-control'])!!}

        </div>
         <div class="form-group">
            {!!Form::label('roel_id','Role:')!!}
            {!!Form::select('role_id',$roles,['class'=>'form-control'])!!}

        </div>
         <div class="form-group">
            {!!Form::label('is_active','Status:')!!}
            {!!Form::select('is_active',array(1=>'Active',0=>'Not active'),null,['class'=>'form-control'])!!}

        </div>
        <div class="form-group">
            {!!Form::label('photo_id','Photo:')!!}
            {!!Form::file('photo_id',null,['class'=>'form-control'])!!}

        </div>
        <div class="form-group">
            {!!Form::label('password','Password:')!!}
            {!!Form::text('password',null,['class'=>'form-control'])!!}

        </div>

        <div class="form-group">
            {!!Form::submit('Update',['class'=>'btn btn-primary'])!!}
        </div>


        {!!Form::close()!!}
       </div>
    </div>
    

 @stop