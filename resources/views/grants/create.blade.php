@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Create a New Grant</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('grants.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title">Grant Title:</label>
                            <input type="text" class="form-control" id="title" name="grant_title" required>
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="project_leader">Project Leader</label>
                        <select class="form-control" id="project_leader" name="project_leader">
                            <option value="">Select a Project Leader</option>
                            @foreach($academicians as $academician)
                                <option value="{{ $academician->id }}">{{ $academician->name }}</option>
                            @endforeach
                        </select>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="organization">Grant Provider:</label>
                            <input type="text" class="form-control" id="provider" name="grant_provider" required>
                        </div>
                        <div class="col-md-6 form-group">
                        <label for="amount">Grant Amount:</label>
                            <input type="number" class="form-control" id="amount" name="grant_amount" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="deadline">Grant Start Date:</label>
                            <input type="date" class="form-control" id="deadline" name="grant_start_date" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="deadline">Duration (Months):</label>
                            <input type="number" class="form-control" id="duration" name="duration" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="description">Grant Description:</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <div class="col-md-6 form-group">
    <label for="members">Project Members</label>
    <div id="members">
        @foreach($academicians as $academician)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="members[]" value="{{ $academician->id }}" id="member{{ $academician->id }}">
                <label class="form-check-label" for="member{{ $academician->id }}">
                    {{ $academician->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>
                    </div>
                    <div class="row justify-content-center mt-4">
                    <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('grants.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const projectLeaderSelect = document.getElementById('project_leader');
        const memberCheckboxes = document.querySelectorAll('.form-check-input');

        projectLeaderSelect.addEventListener('change', function() {
            const selectedLeaderId = this.value;

            memberCheckboxes.forEach(function(checkbox) {
                if (checkbox.value === selectedLeaderId) {
                    checkbox.disabled = true;
                    checkbox.checked = false;
                } else {
                    checkbox.disabled = false;
                }
            });
        });
    });
</script>
@endsection