@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Milestones</h1>
        <a href="{{ route('milestones.create') }}" class="btn btn-success">Create</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
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
                @foreach($milestones as $milestone)
                <tr>
                    <td>{{ $milestone->id }}</td>
                    <td>{{ $milestone->grant_id }}</td>
                    <td>{{ $milestone->grant->grant_title }}</td>
                    <td>{{ $milestone->milestone_title }}</td>
                    <td>{{ $milestone->completion_date }}</td>
                    <td>{{ $milestone->deliverable }}</td>
                    <td>{{ $milestone->status }}</td>
                    <td>{{ $milestone->remarks }}</td>
                    <td>{{ $milestone->date_updated }}</td>
                    <td>
                        <a href="{{ route('milestones.show', $milestone->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('milestones.edit', $milestone->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('milestones.destroy', $milestone->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection