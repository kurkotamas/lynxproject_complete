@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Edit User
                    </div>
                    <div class="card-body">

                        {{--EDIT USER FORM--}}
                        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['User\UserController@update', $user->id]])!!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!}
                                {!! Form::text('name', null, ['class'=>'form-control'])!!}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'E-mail:') !!}
                            {!! Form::text('email', null, ['class'=>'form-control'])!!}
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('phone', 'Phone Number:') !!}
                            {!! Form::text('phone', null, ['class'=>'form-control'])!!}
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password:') !!}
                            {!! Form::password('password', ['class'=>'form-control'])!!}
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! Form::label('password_confirmation', 'Confirm Password:') !!}
                            {!! Form::password('password_confirmation', ['class'=>'form-control'])!!}
                        </div>

                        @foreach($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        <div class="form-group">
                            {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection