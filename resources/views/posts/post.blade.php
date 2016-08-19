<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading"><h3>{{$post->title}}</h3></div>
        <div class="panel-body">
            by <strong>{{$post->author->name}}</strong> | <small> <i class="fa fa-clock-o" aria-hidden="true"></i> {{$post->updated_at}}</small>
            <p>{!!$post->preview!!}</p>
            <a href="/posts/{{$post->id}}" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>