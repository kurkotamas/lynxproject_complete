@extends('layouts.app')

@section('content')

    <div id="terms">
        <div id="users-border" class="container py-4">
            <div class="d-flex justify-content-between">
                <h1 class="text-white px-2">Edit Term</h1>
            </div>
            <hr>
                {{--EDIT TERM FORM--}}
                {!! Form::model($term, ['method'=>'PATCH', 'action'=>['Term\TermController@update', $term->id]])!!}
                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Title'])!!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('content', null, ['class'=>'form-control' , 'placeholder'=>'Content'])!!}
                </div>
                <div class="row">

                    <div class="form-group">
                        {!! Form::submit('Update', ['class'=>'btn btn-primary ml-3']) !!}
                    </div>
                    {!! Form::close() !!}

                    {{--DELETE TERM FORM--}}
                    {!! Form::open(['method'=>'DELETE', 'action'=>['Term\TermController@destroy', $term->id]]) !!}
                    <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger ml-1']) !!}
                        <a href="{{ url()->previous() }}" class="btn btn-info ml-auto">Cancel</a>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection