@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$post->title}}</div>
                    <div class="panel-body">
                        <small>{{$post->updated_at}}</small> by <strong>{{$post->author->name}}</strong>

                        <div class="post-body">
                            {!!$post->preview!!}
                            {!!$post->body!!}
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Comments</h3></div>
                    <div class="panel-body">


                    </div>
                    <div class="panel-footer">
                        <form action="">
                            <textarea name="comment" rows="3" placeholder="Write your comment here!"></textarea>
                            <button type="submit" class="btn btn-primary">Post</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection