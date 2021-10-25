@extends('layout')

@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.js"></script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js" defer></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.js"></script>

    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

    <script type="text/javascript">
        $(document).ready(function() {
            $('.officersTable').DataTable();
        });
    </script>

    <div class="push-top">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
            <div class="alert alert-warning" align="center">
                <a href="{{ route('officers.create')}}" class="btn btn-primary btn-sm">Add Officer</a>
            </div>
            <table class="table table-bordered officersTable">
                <thead>
                    <tr class="table-warning">
                        <td>Username</td>
                        <td>Name</td>
                        <td>Last Name</td>
                        <td>Role</td>
                        <td>Password</td>
                        <td class="text-center">Action</td>
                    </tr>
                </thead>
                <tbody>
                @foreach($officer as $officers)
                    <tr>
                        <td>{{$officers->username}}</td>
                        <td>{{$officers->name}}</td>
                        <td>{{$officers->lastname}}</td>
                        <td>{{$officers->role}}</td>
                        <td>{{$officers->password}}</td>
                        <td class="text-center">
                            <a href="{{ route('officers.edit', $officers->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            @if($officers->role != "Admin")
                                <form action="{{ route('officers.destroy', $officers->id)}}" method="post" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        <div>
@endsection
