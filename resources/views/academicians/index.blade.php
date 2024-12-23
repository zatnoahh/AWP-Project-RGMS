@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Academicians</title>
</head>
<body>
    <div class="container">
        <h1>Academicians</h1>
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
                </tr>
            </thead>
            <tbody>
                @foreach($academicians as $academician)
                <tr>
                    <td>{{ $academician->id }}</td>
                    <td>{{ $academician->name }}</td>
                    <td>{{ $academician->staff_number }}</td>
                    <td>{{ $academician->email }}</td>
                    <td>{{ $academician->collage }}</td>
                    <td>{{ $academician->department }}</td>
                    <td>{{ $academician->position }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection