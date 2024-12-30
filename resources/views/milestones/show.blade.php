@extends('layouts.master')
@section('content')

    <div class="container">
        <h1>Milestone Details</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $milestone->grant->grant_title }}</h2>
            </div>
            <div class="card-body">
                    <p><strong>Milestone Title:</strong> {{ $milestone->milestone_title }}</p>
                    <p><strong>Milestone Completion Date:</strong> {{ $milestone->completion_date }}</p>
                    <p><strong>Milestone Deliverable:</strong> {{ $milestone->deliverable }}</p>
                    <p><strong>Milestone Status:</strong> {{ $milestone->status }}</p>
                    <p><strong>Milestone Remarks:</strong> {{ $milestone->remarks }}</p>
                    <p><strong>Updated at:</strong> {{ $milestone->date_updated }}</p>
            </div>
        </div>
        <a href="{{ route('milestones.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection
