@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Create Grant</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h1>Create A New Academician</h1>
    <form action="{{ route('academicians.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="staff_number">Staff Number:</label>
            <input type="text" class="form-control" id="staff_number" name="staff_number" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="collage">Collage:</label>
            <input type="text" class="form-control" id="collage" name="collage" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position" required>
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role" required>
                <option value="" disabled selected>Please select a role</option>
                <option value="Project Leader">Project leader</option>
                <option value="Project Member">Project Member</option>
                <option value="Researcher">Researcher</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
@endsection