<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
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
            <p>{!!$post->preview!!}</p>
            <a href="/posts/{{$post->id}}" class="btn btn-primary">Read More</a>
        </div>
        <div class="panel-footer">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{url('posts', [$post->id])}}" target="_blank">
                <i class="fa fa-facebook" aria-hidden="true"></i>  Share on Facebook
            </a> |
            {{$post->likesCount()}} Likes |
            @if ($post->isLiked)
                <a href="{{ action('LikesController@likePost', [$post->id]) }}"><i class="fa fa-thumbs-down" aria-hidden="true"></i> Unlike</a>
            @else
                <a href="{{ action('LikesController@likePost', [$post->id]) }}"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Like this Post</a>
            @endif



        </div>
    </div>
</div>