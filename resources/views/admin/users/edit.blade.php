@extends('layouts.admin')

@section('content')

    <h1>Edit Users</h1>

    <div class="row">

        <div class="col-sm-3">
        
            <img src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">

        </div>

        <div class="col-sm-9">
            {!! Form::model([$user,$roles],['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id], 'files'=>true]) !!}
            
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', $user->name, ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', $user->email, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id',[''=>'Choose Options'] + $roles ,$user->role_id, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', [0 => 'Not Active', 1 => 'Actuve'], $user->is_active, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('file', 'File:') !!}
                    {!! Form::file('file', null, ['class'=>'form-control']) !!}
                </div>
            
                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update User',['class' => 'btn btn-primary col-sm-6']) !!}
                </div>
            
            {!! Form::close() !!}



            {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
            
                <div class="form-group">
                    {!! Form::submit('Delete User',['class' => 'btn btn-danger col-sm-6']) !!}
                </div>
            
            {!! Form::close() !!}

        </div>

    </div>

    <div class="row">
        @include('includes.form_error')
    </div>


@endsection

@section('footer')
    
@endsection