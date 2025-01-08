@extends('layouts.master')
@section('content')

    <div class="container">
        <h1>Milestones</h1>
        @can('isAcademician' || 'isAdmin')
        <a href="{{ route('milestones.create') }}" class="btn btn-success">Create</a>
        @endcan
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Grant ID</th>
                    <th>Grant Title</th>
                    <th>Milestone Title</th>
                    <th>Completion Date</th>
                    <th>Deliverable</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Date Updated</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($milestones->isEmpty())
                <tr>
                    <td colspan="9">No milestones found.</td>
                </tr>
                @endif
                @foreach($milestones as $milestone)
                <tr>
                    <td>{{ $milestone->grant_id }}</td>
                    <td>{{ $milestone->grant->grant_title }}</td>
                    <td>{{ $milestone->milestone_title }}</td>
                    <td>{{ $milestone->completion_date }}</td>
                    <td>{{ $milestone->deliverable }}</td>
                    <td class="status">{{ $milestone->status }}</td>
                    <td>{{ $milestone->remarks }}</td>
                    <td>{{ $milestone->date_updated }}</td>
                    <td>
                        <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-primary">Edit</a>
                        @can('isAdmin')
                        <form method="POST" action="{{ route('milestones.destroy', $milestone->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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