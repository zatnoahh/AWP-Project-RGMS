@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Create a New Grant</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('grants.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="title">Grant Title:</label>
                        <input type="text" class="form-control" id="title" name="grant_title" required>
                    </div>
                    <div class="form-group">
                        <label for="project_leader">Project Leader</label>
                        <select class="form-control" id="project_leader" name="project_leader" required>
                            <option value="" disabled selected>Please select a project leader</option>
                            @foreach($academicians as $academician)
                                <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                            @endforeach
                        </select>
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
                        <input type="number" class="form-control" id="duration" name="duration" required>
                    </div>
                    <div class="form-group">
                        <label for="members">Project Members</label>
                        <select class="form-control" id="members" name="members[]" multiple>
                            @foreach($academicians as $academician)
                                <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('grants.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection