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
            <label for="deliverable">Deliverable:</label>
            <input type="text" class="form-control" id="deliverable" name="deliverable" value="{{ $milestone->deliverable }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Pending" {{ $milestone->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ $milestone->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $milestone->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
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
</div>

@endsection
