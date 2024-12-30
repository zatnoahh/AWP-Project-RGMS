@extends('layouts.master')
@section('content')

<div class="container">
    <h1>Edit Milestone</h1>
    <form method="POST" action="{{ route('milestones.update', $milestone->id) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $milestone->milestone_title }}" required>
        </div>
        <div class="form-group">
            <label for="completion_date">Target Completion Date:</label>
            <input type="date" class="form-control" id="completion_date" name="completion_date" value="{{ $milestone->completion_date }}" required>
        </div>
        <div class="form-group">
            <label for="deliverable">Deliverable:</label>
            <input type="text" class="form-control" id="deliverable" name="deliverable" value="{{ $milestone->deliverable }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $milestone->status }}" required>
        </div>
        <div class="form-group">
            <label for="remarks">Remarks:</label>
            <textarea class="form-control" id="remarks" name="remarks">{{ $milestone->remarks }}</textarea>
        </div>
        <div class="form-group">
            <label for="date_updated">Date Updated:</label>
            <input type="date" class="form-control" id="date_updated" name="date_updated" value="{{ $milestone->date_updated }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Milestone</button>
    </form>
    <a href="{{ route('milestones.index') }}" class="btn btn-secondary mt-3">Back to Milestone</a>

@endsection
