<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">{{$post->title}}</div>
        <div class="panel-body">
            <small>{{$post->updated_at}}</small> by <strong>{{$post->author->name}}</strong>
            <p>{!!$post->preview!!}</p>
            <a href="/posts/{{$post->id}}" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>