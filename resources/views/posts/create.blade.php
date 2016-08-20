
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if(isset($model->id))
                            <h4>Edit Post</h4>
                            @else
                            <h4>Create new Post</h4>
                        @endif

                    </div>
                    <div class="panel-body">

                        {!! Form::model($model,['action' => (isset($model->id) ? ["PostsController@update", $model->id] : 'PostsController@store'), 'method' => (isset($model->id) ? 'PUT' : 'POST') ,'class' => 'form-horizontal']) !!}
                        <div class="form-body">
                            {{csrf_field()}}

                            {{ Form::field('Title', Form::text('title', NULL, ['class' => 'form-control']), 'required') }}
                            {{ Form::field('Preview', Form::textarea('preview', NULL, ['class' => 'form-control']), 'required') }}
                            {{ Form::field('Body', Form::textarea('body', NULL, ['class' => 'form-control']), 'required') }}

                            <div class="form-group">
                            <div class="col-md-4 col-md-offset-2">
                            {!! Form::submit('Save', ['class' => 'btn default green']) !!}
                                <a href="{{ action('PostsController@index') }}" class =' btn default silver'> Cancel</a>
                            </div>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-scripts')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection