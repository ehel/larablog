@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row single-post">
            <div class="col-md-12">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <h3>Users</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td scope="row">{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>

                                        {!! Form::model($user, ['action' => "AdminController@changeRole", 'method' => 'POST' ,'class' => 'form-horizontal']) !!}
                                        <div class="form-body">
                                            {{csrf_field()}}

                                            {{ Form::select('role', ['admin' => 'Administrator', 'author' => 'Author', 'subscriber' => 'Subscriber']) }}
                                            <input type="hidden" name="user_id" value="{{$user->id}}">

                                            <div class="form-group pull-right">
                                                <div class="col-md-4">
                                                    {!! Form::submit('Change Role', ['class' => 'btn default green']) !!}

                                                </div>
                                            </div>

                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach


                            </tbody>
                        </table>
                    </div>

                </div>


            </div>


        </div>
    </div>
@endsection