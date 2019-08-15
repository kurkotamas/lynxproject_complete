@extends('layouts.index')

@section('content')

    <div class="container bg-white p-4">
        <div class="row">
            <div class="col">
                <h1 class="display-4">Terms and Conditions</h1>
                <hr>
                @foreach($terms as $term)
                    <div class="pl-3">
                        <h4>{{$term->name}}</h4>
                        <small><p class="font-italic text-secondary pl-1">{{$term->created_at->format('Y-m-d') }}</p></small>
                        <p class="lead pl-3">{{$term->content}}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

@endsection