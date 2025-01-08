@extends('layouts.master')
@section('content')

    <div class="container">
        <h1>Academicians</h1>
        @can('isAdmin', App\Models\Academician::class)
        <a href="{{ route('academicians.create') }}" class="btn btn-success">Create</a>
        @endcan
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Staff Number</th>
                    <th>Email</th>
                    <th>College</th>
                    <th>Department</th>
                    <th>Position</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($academicians as $academician)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $academician->name }}</td>
                    <td>{{ $academician->staff_number }}</td>
                    <td>{{ $academician->email }}</td>
                    <td>{{ $academician->college }}</td>
                    <td>{{ $academician->department }}</td>
                    <td>{{ $academician->position }}</td>
                    <td>
                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('academicians.show', $academician->id) }}">Show</a></li>
                                <li><a class="dropdown-item" href="{{ route('academicians.edit', $academician->id) }}">Edit</a></li>
                                @can('isAdmin')
                                <li>
                                    <form method="POST" action="{{ route('academicians.destroy', $academician->id) }}" style="display: inline;">
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
            </tbody>
        </table>

    </div>

@endsection