@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($posts->isEmpty())
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>No Posts Yet</h3>
                    </div>
                </div>
            </div>
        @endif
        @foreach($posts as $post)
            @include('posts.post',$post)
        @endforeach

    </div>
    <div class="row">
        <div style="text-align: center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
