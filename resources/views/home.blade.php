@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($posts as $post)
            @include('posts.post',$post)
        @endforeach
            {{ $posts->links() }}
    </div>
</div>
@endsection
