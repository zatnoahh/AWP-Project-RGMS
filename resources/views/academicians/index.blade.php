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
                    <th>ID</th>
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
                    <td>{{ $academician->id }}</td>
                    <td>{{ $academician->name }}</td>
                    <td>{{ $academician->staff_number }}</td>
                    <td>{{ $academician->email }}</td>
                    <td>{{ $academician->college }}</td>
                    <td>{{ $academician->department }}</td>
                    <td>{{ $academician->position }}</td>
                    <td>
                        <a href="{{ route('academicians.show', $academician->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('academicians.edit', $academician->id) }}" class="btn btn-primary">Edit</a>
                        @can('isAdmin')
                        <form method="POST" action="{{ route('academicians.destroy', $academician->id) }}" style="display: inline;">
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