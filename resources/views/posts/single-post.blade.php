@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row single-post">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default ">
                    <div class="panel-heading"><div class="row">
                            <div class="col-md-10">
                                <h3>{{$post->title}}</h3>
                            </div>
                            <div class="col-md-2">
                                @if($post->isOwnedByAuthenticatedUser())
                                    <div class="btn-action" role="group">
                                        <a href="/posts/{{$post->id}}/edit" type="button" class="btn btn-default btn-edit">Edit</a>
                                        {!! Form::open([ 'method'  => 'delete', 'route' => [ 'posts.destroy', $post->id ] ]) !!}
                                        <button  type="submit" class="btn btn-danger btn-delete">Delete</button>
                                        {!! Form::close() !!}
                                    </div>
                                @endif
                            </div>
                        </div></div>
                    <div class="panel-body">
                        by <strong>{{$post->author->name}}</strong> | <small> <i class="fa fa-clock-o" aria-hidden="true"></i> {{$post->updated_at}}</small>

                        <div class="post-body">
                            {!!$post->preview!!}
                            {!!$post->body!!}
                        </div>

                    </div>
                    <div class="panel-footer">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" target="_blank">
                            <i class="fa fa-facebook" aria-hidden="true"></i>  Share on Facebook
                        </a> |
                        {{$post->likesCount()}} Likes |
                        @if ($post->isLiked)
                            <a href="{{ action('LikesController@likePost', [$post->id]) }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Unlike</a>
                        @else
                            <a href="{{ action('LikesController@likePost', [$post->id]) }}">Like this Post</a>
                        @endif


                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Comments</h3></div>
                    <div class="panel-body">
                    @foreach($post->comments as $comment)
                        <div class="comment">
                            <div class="author">
                                {{$comment->user->name}}
                            </div>
                            <div class="date">
                                <small><i class="fa fa-clock-o" aria-hidden="true"></i> {{$comment->updated_at}} |
                                    @if ($comment->isLiked)
                                        <a href="{{ action('LikesController@likeComment', [$comment->id]) }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Unlike</a>
                                    @else
                                        <a href="{{ action('LikesController@likeComment', [$comment->id]) }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like this Comment</a>
                                    @endif
                                </small>
                            </div>
                            <p>{{$comment->body}}</p>

                            <div class="divider">

                            </div>
                        </div>
                        @endforeach

                    </div>

                    <div class="panel-footer">
                        @if (Auth::guest())
                            <p>You must login to post a comment.</p>
                        @else
                            <form action="/add_comment" method="POST" class="comment-form">
                                {{--<input type="hidden" name="user_id" value="{{Auth::id()}}">--}}
                                {{csrf_field()}}
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                                <div class="row">
                                    <div class="col-md-10">
                                        <textarea name="body" rows="1" placeholder="Write your comment here!"></textarea></div>
                                    <div class="col-md-2"><button type="submit" class="btn btn-primary btn-block">Post</button></div>
                                </div>


                            </form>
                        @endif

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection