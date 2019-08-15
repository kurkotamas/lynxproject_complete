@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">Dashboard</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ session('status') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--You are logged in!--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<!-- USERS -->
<div id="users">
    <div id="users-border" class="container py-4">
        <h1 class="text-white px-2">Users</h1>
        <hr>
        <div  class="container">
            <table class="table table-striped bg-white">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Phone</th>
                    <th>Registered</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Unverify</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                        <td>
                        {{--DELETE USER FORM--}}
                        {!! Form::open(['method'=>'DELETE', 'action'=>['User\UserController@destroy', $user->id]])!!}

                        <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                        </div>

                        {!! Form::close() !!}
                        </td>
                        <td>
                        {{-- UNVERIFY USER FORM--}}
                            @if($user->email_verified_at)
                                {!! Form::open(['method'=>'PATCH', 'action'=>['User\UserController@unverify', $user->id]])!!}
                                <div class="form-group">
                                    {!! Form::submit('Unverify', ['class'=>'btn btn-warning btn-sm']) !!}
                                </div>
                                {!! Form::close() !!}
                            @else
                                <button class="btn btn-secondary btn-sm disabled">Unverify</button>
                            @endif
                        </td>
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
