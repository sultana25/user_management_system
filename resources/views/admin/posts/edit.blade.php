@extends('layouts.admin')


@section('content')

    <h1>Edit Posts</h1>
    @include('includes.form_errors')
    <div class="row">
    <div class="col-sm-3">
             <img  src="{{$post->photo?$post->photo->file:'http://placehold.it'}}" alt="" class="img-responsive">
    </div>
    <div class="col-sm-9">
    {!!Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>true])!!}
      
       <div class="form-group">
          {!!Form::label('title','Title:')!!}
          {!!Form::text('title',null,['class'=>'form-control'])!!} 
       </div>
       <div class="form-group">
          {!!Form::label('category_id','Category:')!!}
          {!!Form::select('category_id',$categories,null,['class'=>'form-control'])!!} 
       </div>
       <div class="form-group">
          {!!Form::label('photo_id','Photo:')!!}
          {!!Form::file('photo_id',null,['class'=>'form-control'])!!} 
       </div>
       <div class="form-group">
          {!!Form::label('body','Description:')!!}
          {!!Form::textarea('body',null,['class'=>'form-control'])!!} 
       </div>
       <div class="form-group">
           {!!Form::submit('Update Post',['class'=>'btn btn-primary'])!!}
       </div>
        
    {!!Form::close()!!}
    
    {!!Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id]])!!}
    <div class="form-group">
        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
    </div>
    {!!Form::close()!!}
    </div>
    </div>
    
@stop