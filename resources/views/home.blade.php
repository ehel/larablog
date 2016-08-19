@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
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
