@extends('layouts.app')

@section('content')

    <div id="terms">
        <div id="users-border" class="container py-4">
            <div class="d-flex justify-content-between">
                <h1 class="text-white px-2">Terms</h1>
                <a href="{{ route('terms.create') }}" class="btn btn-success mr-3">Create Term</a>
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($terms as $term)
                        <tr>
                            <th scope="row">{{ $term->id }}</th>
                            <td>{{ $term->name }}</td>
                            <td>{{ $term->content }}</td>
                            <td>{{ $term->created_at->diffForHumans() }}</td>
                            {{--<td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a></td>--}}
                            {{--<td>--}}
                                {{--DELETE USER FORM--}}
                                {{--{!! Form::open(['method'=>'DELETE', 'action'=>['User\UserController@destroy', $user->id]])!!}--}}

                                {{--<div class="form-group">--}}
                                    {{--{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}--}}
                                {{--</div>--}}

                                {{--{!! Form::close() !!}--}}
                            {{--</td>--}}
                            {{--                        <td><a href="{{ route('users.edit', $user->id }}" class="btn btn-warning btn-sm">Unverify</a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection