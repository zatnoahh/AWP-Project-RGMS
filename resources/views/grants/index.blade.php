@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Grants</title>
</head>
<body>
    <div class="container">
        <h1>Grants</h1>
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
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection