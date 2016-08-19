
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body">
                        {!! Form::model($model, ['class' => 'form-horizontal']) !!}
                        <div class="form-body">

                            {{ Form::field('Title', Form::text('title', NULL, ['class' => 'form-control']), 'required') }}
                            {{ Form::field('Preview', Form::textarea('preview', NULL, ['class' => 'form-control']), 'required') }}
                            {{ Form::field('Body', Form::textarea('body', NULL, ['class' => 'form-control']), 'required') }}

                            <div class="form-group">
                            <div class="col-md-4 col-md-offset-3">
                            {!! Form::submit('Save', ['class' => 'btn default green', 'data-action' => (isset($model->id) ? 'update' : 'store'), 'data-scope' => 'action', 'data-id' => (isset($model->id) ? $model->id : NULL) ]) !!}
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endsection