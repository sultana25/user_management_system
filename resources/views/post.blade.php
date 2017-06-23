@extends('layouts.blog-post')


@section('content')
     <h1>{{$post->title}}</h1>
                

                <!-- Author -->
                <p class="lead">
                    by <a href="#">{{$post->user->name}}</a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>{{$post->created_at->diffForHumans()}}</p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="{{$post->photo->file}}" alt="">

                <hr>

                <!-- Post Content -->
                <p>{{$post->body}}</p>
                <hr>
                @if(Session::has('comment_msg'))
                    {{session('comment_msg')}}
                @endif
                
                @if(Auth::check())

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                   {!!Form::open(['method'=>'POST','action'=>'PostCommentsController@store'])!!}
                   <input type="hidden" name="post_id" value="{{$post->id}}">
                   <div class="form-group">
                       {!!Form::label('body','Body:')!!}
                       {!!Form::textarea('body',null,['class'=>'form-control','rows'=>3])!!}
                   </div>
                   <div class="form-group">
                       {!!Form::submit('Submit Comment',['class'=>'btn btn-primary'])!!}
                   </div>
                   {!!Form::close()!!}
                </div>
                @endif

                <hr>

                <!-- Posted Comments -->
                @if(count($comments)>0)
                    @foreach($comments as $comment)
                    <!-- Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img height="64" class="media-object" src="{{$comment->photo}}" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$comment->author}}
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </h4>
                                <p>{{$comment->body}}</p>
                                <!-- Nested Comment -->
                                @if(count($comment->replies) > 0)
                                   @foreach($comment->replies as $reply) 
                                       @if($reply->is_active == 1)
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img height='64' class="media-object" src="{{$reply->photo}}" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading">{{$reply->author}}
                                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                                </h4>
                                                <p>{{$reply->body}}</p>
                                        

                                           
                                            </div>
                                        </div>
                                        
                                        @endif
                                        
                                        
                                    @endforeach 
                                    
                                   
                                  
                                 @endif                            

                            <!-- End Nested Comment -->
                                <div class="comment-reply-container">
                                <button class="reply-toggle btn btn-primary pull-right">Reply</button>
                                    <div class="comment-reply col-sm-6" style="display:none">
                                        {!!Form::open(['method'=>'POST','action'=>'commentrepliesController@createReply'])!!}
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                    <div class="form-group">
                                        {!!Form::label('body','Reply:')!!}
                                        {!!Form::textarea('body',null,['class'=>'form-control','rows'=>1])!!}

                                    </div>
                                    <div class="form-group">
                                        {!!Form::submit('Submit',['class'=>'btn btn-primary'])!!}
                                    </div>
                                             </div>
                              </div>

                        </div>
                 </div>
                    @endforeach
                @endif

            
@stop
@section('scripts')
   <script>
        $(".comment-reply-container .reply-toggle").click(function(){
            $(this).next().slideToggle('slow');
        });
    </script>
@stop
