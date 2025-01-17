@extends('layouts.master')
@section('content')

    <div class="container">
        <h1>Projects</h1>
        @can('isAdmin', App\Models\Grant::class)
        <a href="{{ route('grants.create') }}" class="btn btn-success">Create</a>
        @endcan
        <table class="table table-bordered" >
            <thead>
            <tr>
                <th>No</th>
                <th>Grant Title</th>
                <th>Grant Project Leader</th>
                <th>Grant Members</th>
                <th>Grant Provider</th>
                <th>Grant Amount (RM)</th>
                <th>Description</th>
                <th>Grant Start Date</th>
                <th>Duration (Month)</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($grants as $grant)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $grant->grant_title }}</td>
                <td>
                    @foreach($grant->academicians as $academician)
                        @if($academician->pivot->role == 'Project Leader')
                            {{ $academician->name }}
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($grant->academicians as $academician)
                        @if($academician->pivot->role == 'Member')
                            <li>{{ $academician->name }}</li>
                        @endif
                    @endforeach
                <td>{{ $grant->grant_provider }}</td>
                <td>{{ $grant->grant_amount }}</td>
                <td>{{ $grant->description }}</td>
                <td>{{ $grant->grant_start_date }}</td>
                <td>{{ $grant->duration }}</td>
                <td>
                    <a href="{{ route('grants.show', $grant->id) }}" class="btn btn-info">Show</a>
                    @can('isAdmin')
                    <a href="{{ route('grants.edit', $grant->id) }}" class="btn btn-primary">Edit</a>
                    <form method="POST" action="{{ route('grants.destroy', $grant->id) }}" style="display: inline;">
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