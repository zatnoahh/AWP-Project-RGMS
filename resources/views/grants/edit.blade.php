@extends('layouts.master')
@section('content')

<div class="container">
    <h1>Edit Grant</h1>
    <form  method="POST" action="{{ route('grants.update', $grant->id) }}">
        @method('PUT')
        @csrf       
        <div class="form-group">
            <label for="title">Grant Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $grant->grant_title }}" required>
        </div>
        <div>
            <label for="provider">Grant Provider:</label>
            <input type="text" class="form-control" id="provider" name="provider" value="{{ $grant->grant_provider }}" required>
        </div>
        <div class="form-group">
            <label for="amount">Grant Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $grant->grant_amount }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $grant->description }}</textarea>
        </div>    
        <div class="form-group">
            <label for="duration">Duration (Month):</label>
            <input type="number" class="form-control" id="duration" name="duration" value="{{ $grant->duration }}" required>
        </div>
        <div class="form-group">
            <label for="deadline">Grant Start Date:</label>
            <input type="date" class="form-control" id="grant_start_date" name="grant_start_date" value="{{ $grant->grant_start_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Grant</button>
    </form>
    <a href="{{ route('grants.index') }}" class="btn btn-secondary mt-3">Back to Grants</a>
</div>
@endsection