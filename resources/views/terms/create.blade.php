@extends('layouts.app')

@section('content')

    <div id="terms">
        <div id="users-border" class="container py-4">
            <div class="d-flex justify-content-between">
                <h1 class="text-white px-2">Create Term</h1>
            </div>
            <hr>
            <div  class="container">

                {{--CREATE TERM FORM--}}
                {!! Form::open(['method'=>'POST', 'action'=>'Term\TermController@store'])!!}

                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Title'])!!}
                </div>

                <div class="form-group">
                    {!! Form::textarea('content', null, ['class'=>'form-control' , 'placeholder'=>'Content'])!!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Create', ['class'=>'btn btn-primary form-control']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection