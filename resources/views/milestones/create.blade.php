@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Create a New Milestone</h1>
        <form action="{{ route('milestones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="grant_name">Grant Name:</label>
                <select name="grant_id" id="grant_id" class="form-control">
                <option value="" disabled selected>Please select a grant</option>
                    @foreach($grants as $grant)
                        <option value="{{ $grant->id }}">{{ $grant->grant_title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="milestone_title">Milestone Title:</label>
                <input type="text" class="form-control" id="milestone_title" name="milestone_title" required>
            </div>
            <div class="form-group">
                <label for="completion_date">Target Completion Date:</label>
                <input type="date" class="form-control" id="completion_date" name="completion_date" required>
            </div>
            <div class="form-group">
                <label for="deliverable">Deliverable:</label>
                <input type="text" class="form-control" id="deliverable" name="deliverable" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks:</label>
                <textarea class="form-control" id="remarks" name="remarks"></textarea>
            </div>
            <div class="form-group">
                <label for="date_updated">Date Updated:</label>
                <input type="date" class="form-control" id="date_updated" name="date_updated" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
