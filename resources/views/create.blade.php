@extends('layout')

@section('content')

    <style>
        .container {
            max-width: 450px;
        }
        .push-top {
            margin-top: 50px;
        }
    </style>

    <div class="card push-top">
        <div class="alert alert-warning" align="center">
            <a href="{{ route('officers.index')}}" class="btn btn-primary btn-sm">View Officers</a>
        </div>
        <div class="card-header">
            Create New Officer
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('officers.store') }}">

                <div class="form-group">
                    @csrf
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username"/>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname"/>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" name="role">
                        <option value="User">User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password"/>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Confirm Password</label>
                    <input type="text" class="form-control" name="password_confirmation"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Create Officer</button>
            </form>
        </div>
    </div>
@endsection
