@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Grants</h1>
        <a href="{{ route('grants.create') }}" class="btn btn-success">Create</a>
        <table class="table table-bordered" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Grant Title</th>
                <th>Grant Provider</th>
                <th>Grant Amount</th>
                <th>Description</th>
                <th>Grant Start Date</th>
                <th>Duration</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($grants as $grant)
            <tr>
                <td>{{ $grant->id }}</td>
                <td>{{ $grant->grant_title }}</td>
                <td>{{ $grant->grant_provider }}</td>
                <td>{{ $grant->grant_amount }}</td>
                <td>{{ $grant->description }}</td>
                <td>{{ $grant->grant_start_date }}</td>
                <td>{{ $grant->duration }}</td>
                <td>
                    <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-info">Show</a>
                    <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('grants.destroy', $grant->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection