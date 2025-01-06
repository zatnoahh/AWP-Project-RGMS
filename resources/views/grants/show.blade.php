@extends('layouts.master')
@section('content')

    <div class="container">
        <h1>Grant Details</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $grant->grant_title }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Grant Provide:</strong> {{ $grant->grant_provider }}</p>
                <p><strong>Grant Amount (RM):</strong> {{ $grant->grant_amount }}</p>
                <p><strong>Grant Description:</strong> {{ $grant->description }}</p>
                <p><strong>Grant Start Date:</strong> {{ $grant->grant_start_date }}</p>
                <p><strong>Duration (Month):</strong> {{ $grant->duration }}</p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
            <h3>Grant Members</h3>
            </div>
            <div class="card-body">
            @if($grant->academicians->isEmpty())
                <p>No members found for this grant.</p>
            @else
                <table class="table">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grant->academicians as $academician)
                    <tr>
                        <td>{{ $academician->name }}</td>
                        <td>{{ $academician->email }}</td>
                        <td>{{ $academician->pivot->role }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            @endif
            </div>
        </div>

        <br>
        @can('isAcademician')
        <a href="{{ route('milestones.create', ['grant_id' => $grant->id]) }}" class="btn btn-success">Create A New Milestone</a>
            @endcan
        <div class="card mt-3">
            <div class="card-header">
                <h3>Milestones</h3>
            </div>
            <div class="card-body">
                @if($grant->milestones->isEmpty())
                    <p>No milestones found for this grant.</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Target Completion Date</th>
                                <th>Deliverables</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Updated On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grant->milestones as $milestone)
                                <tr>
                                    <td>{{ $milestone->milestone_title }}</td>
                                    <td>{{ $milestone->completion_date }}</td>
                                    <td>{{ $milestone->deliverable }}</td>
                                    <td class="status">{{ $milestone->status }}</td>
                                    <td>{{ $milestone->remarks }}</td>
                                    <td>{{ $milestone->date_updated }}</td>
                                    <td>
                                        <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-primary">Edit</a>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        <a href="{{ route('grants.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const statusElements = document.querySelectorAll('.status');
        statusElements.forEach(function(statusElement) {
            const status = statusElement.textContent.trim();
            if (status === 'Pending') {
                statusElement.style.color = 'orange';
            } else if (status === 'In Progress') {
                statusElement.style.color = 'blue';
            } else if (status === 'Completed') {
                statusElement.style.color = 'green';
            }
        });
    });
</script>
@endsection
