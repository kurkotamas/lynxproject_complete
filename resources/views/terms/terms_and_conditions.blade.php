@extends('layouts.index')

@section('content')

    <div class="container bg-white p-4">
        <div class="row">
            <div class="col">
                @if($term)
                <h1 class="display-4">Terms and Conditions</h1>
                <hr>
                <div class="pl-3">
                    <h4>{{$term->name}}</h4>
                    <small><p class="font-italic text-secondary pl-1">{{$term->published_at}}</p></small>
                    <p class="lead pl-3">{{$term->content}}</p>
                @else
                        <h1>No terms accepted</h1>
                @endif
                </div>
            </div>
        </div>
    </div>

@endsection