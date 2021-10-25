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
        <div class="card-header">
            Edit & Update
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
            <form method="post" action="{{ route('officers.update', $officer->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Username</label>
                    <input type="text" class="form-control" name="username" value="{{ $officer->username }}"/>
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $officer->name }}"/>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="{{ $officer->lastname }}"/>
                </div>
                <div class="form-group">
                    <label for="role">Last Name</label>
                    <select class="form-control" name="role">
                        <option value="{{$officer->role}}">{{$officer->role}}</option>
                        @if($officer->role == "Admin")
                            <option value="User">User</option>
                        @else
                            <option value="Admin">Admin</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" value="{{ $officer->password }}"/>
                </div>
                <button type="submit" class="btn btn-block btn-danger">Update User</button>
            </form>
        </div>
    </div>
@endsection
