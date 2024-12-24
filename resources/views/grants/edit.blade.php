@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edit Grant</h1>
    <form  method="POST" action="{{ route('grants.update', $grant->id) }}">
        @method('PUT')
        @csrf       
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $grant->grant_title }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $grant->description }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $grant->grant_amount }}" required>
        </div>
        
        <div class="form-group">
            <label for="deadline">Deadline:</label>
            <input type="date" class="form-control" id="deadline" name="deadline" value="{{ $grant->deadline }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Grant</button>
    </form>
</div>
@endsection