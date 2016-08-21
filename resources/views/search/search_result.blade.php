@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><div class="row">
                                <div class="col-md-12">
                                    <h3>{{$post['title']}}</h3>
                                </div>

                            </div></div>
                        <div class="panel-body">

                            <p>{!!$post['preview']!!}</p>
                            <a href="/posts/{{$post['id']}}" class="btn btn-primary">View Post</a>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
