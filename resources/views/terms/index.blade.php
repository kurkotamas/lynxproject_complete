@extends('layouts.app')

@section('content')

    <div id="terms">
        <div id="users-border" class="container py-4">
            <div class="d-flex justify-content-between">
                <h1 class="text-white px-2">Terms</h1>
                <div class="form-group">
                    <a href="{{ route('terms.create') }}" class="btn btn-success mr-3">Create Term</a>
                </div>
            </div>
            <hr>
            <div  class="container">
                <table class="table table-striped bg-white">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Added</th>
                        <th>Published</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($terms as $term)
                        <tr>
                            <th scope="row">{{ $term->id }}</th>
                            <td>{{ $term->name }}</td>
                            <td>{{ $term->content }}</td>
                            <td>{{ \Carbon\Carbon::parse($term->created_at)->diffForHumans()}}</td>
                            <td>
                                <div class="row">
                                    {{-- EDIT TERM FORM--}}
                                    @if($term->published_at)
                                        <p>{{ $term->published_at }}</p>
                                    @else
                                    {!! Form::open(['method'=>'PATCH', 'action'=>['Term\TermController@publish', $term->id]]) !!}

                                    <div class="form-group">
                                        <a href="{{ route('terms.edit', $term->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        {!! Form::submit('Publish', ['class'=>'btn btn-warning btn-sm']) !!}
                                    </div>

                                    {!! Form::close() !!}

                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-center">
                        {{ $terms->links() }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection