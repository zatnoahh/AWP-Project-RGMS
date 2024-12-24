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
        <h1>Create a New Grant</h1>
        <form action="{{ route('grants.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Grant Title:</label>
                <input type="text" class="form-control" id="title" name="grant_title" required>
            </div>
            <div class="form-group">
                <label for="organization">Grant Provider:</label>
                <input type="text" class="form-control" id="provider" name="grant_provider" required>
            </div>
            <div class="form-group">
                <label for="amount">Grant Amount:</label>
                <input type="number" class="form-control" id="amount" name="grant_amount" required>
            </div>
            <div class="form-group">
                <label for="description">Grant Description:</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="deadline">Grant Start Date:</label>
                <input type="date" class="form-control" id="deadline" name="grant_start_date" required>
            </div>
            <div class="form-group">
                <label for="deadline">Duration (Months):</label>
                <input type="integer" class="form-control" id="duration" name="duration" required>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
@endsection