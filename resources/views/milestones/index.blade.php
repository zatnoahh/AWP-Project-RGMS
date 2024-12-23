@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Milestones</title>
</head>
<body>
    <div class="container">
        <h1>Milestones</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Grant ID</th>
                    <th>Milestone Title</th>
                    <th>Completion Date</th>
                    <th>Deliverable</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Date Updated</th>
                </tr>
            </thead>
            <tbody>
                @foreach($milestones as $milestone)
                <tr>
                    <td>{{ $milestone->id }}</td>
                    <td>{{ $milestone->grant_id }}</td>
                    <td>{{ $milestone->milestone_title }}</td>
                    <td>{{ $milestone->completion_date }}</td>
                    <td>{{ $milestone->deliverable }}</td>
                    <td>{{ $milestone->status }}</td>
                    <td>{{ $milestone->remarks }}</td>
                    <td>{{ $milestone->date_updated }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
@endsection