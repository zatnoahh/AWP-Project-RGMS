@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create a New Milestone</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('milestones.store') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="grant_id">Select Grant:</label>
                        <select name="grant_id" id="grant_id" class="form-control" required>
                            <option value="">-- Select a Grant --</option>
                            @foreach($grants as $grant)
                                <option value="{{ $grant->id }}">{{ $grant->grant_title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="milestone_title">Milestone Title:</label>
                        <input type="text" class="form-control" id="milestone_title" name="milestone_title" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="completion_date">Target Completion Date:</label>
                        <input type="date" class="form-control" id="completion_date" name="completion_date" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="deliverable">Deliverable:</label>
                        <input type="text" class="form-control" id="deliverable" name="deliverable" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="status">Status:</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="date_updated">Date Updated:</label>
                        <input type="date" class="form-control" id="date_updated" name="date_updated" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="remarks">Remarks:</label>
                        <textarea class="form-control" id="remarks" name="remarks"></textarea>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('milestones.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
