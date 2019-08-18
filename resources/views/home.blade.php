@extends('layouts.app')

@section('content')

<!-- USERS -->
<div id="users">
    <div id="users-border" class="container py-4">
        <div class="row">
            <h1 class="col text-white px-4">Users</h1>
            <div class="col-md-4 ml-auto form-group">
                <input class="form-control bg-secondary text-white" type="text" name="search_user" id="search_user" placeholder="Search">
            </div>
        </div>

        <hr>
        <div  class="container">
            <table id="users_table" class="table table-striped bg-white">
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
                        <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a></td>
                        <td>
                        {{--DELETE USER WITH AJAX--}}
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <button class="deleteRecord btn btn-danger btn-sm" data-id="{{ $user->id }}" >Delete</button>
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
                                <div class="form-group">
                                    <button class="btn btn-secondary btn-sm disabled">Unverify</button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <nav>
                <ul class="pagination justify-content-center">
                    {{ $users->links() }}
                </ul>
            </nav>
        </div>
    </div>
</div>


@endsection
