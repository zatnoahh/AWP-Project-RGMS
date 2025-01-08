@extends('layouts.master')
@section('content')

<div class="container">
    <h1>Users</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Staff Number</th>
                <th>User Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->staff_number }}</td>
                <td>{{ $user->userCategory }}</td>
                <td>
                    @can('isAdmin')
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection