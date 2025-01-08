@extends('layouts.master')
@section('content')

    <div class="container">
        <h1>Grants</h1>
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
            @if($grants->isNotEmpty())
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
                    <ul>
                        @foreach($grant->academicians as $academician)
                            @if($academician->pivot->role == 'Member')
                                <li>{{ $academician->name }}</li>
                            @endif
                        @endforeach
                    </ul>
                    <td>{{ $grant->grant_provider }}</td>
                    <td>{{ $grant->grant_amount }}</td>
                    <td>{{ $grant->description }}</td>
                    <td>{{ $grant->grant_start_date }}</td>
                    <td>{{ $grant->duration }}</td>
                    <td>
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('grants.show', $grant->id) }}">Show</a></li>
                                <li><a class="dropdown-item" href="{{ route('grants.edit', $grant->id) }}">Edit</a></li>
                                @can('isAdmin')
                                <li>
                                    <form method="POST" action="{{ route('grants.destroy', $grant->id) }}" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item">Delete</button>
                                    </form>
                                </li>
                                @endcan
                            </ul>
                        </div>
                    </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="10" class="text-center">You did not become any Project Leader of grants</td>
                    </tr>
                    @endif
            </tbody>
        </table>
    </div>
@endsection