@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Academician Details</h1>
        <div class="card mb-3">
            <div class="card-header">
                <h2>{{ $academician->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Staff Number:</strong> {{ $academician->staff_number }}</p>
                <p><strong>Email:</strong> {{ $academician->email }}</p>
                <p><strong>College:</strong> {{ $academician->college }}</p>
                <p><strong>Department:</strong> {{ $academician->department }}</p>
                <p><strong>Position:</strong> {{ $academician->position }}</p>
            </div>
        </div>

        <h2>Grants Under This Academician</h2>
        @if($academician->grants->isEmpty())
            <p><strong>No grants available for this academician.</p>
        @else
            <table class="table table-bordered">
            <thead>
                <tr>
                <th>Grant Title</th>
                <th>Grant Provider</th>
                <th>Grant Amount (RM)</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>Duration (Month)</th>
                <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($academician->grants as $grant)
                <tr>
                    <td>{{ $grant->grant_title }}</td>
                    <td>{{ $grant->grant_provider }}</td>
                    <td>{{ $grant->grant_amount }}</td>
                    <td>{{ $grant->description }}</td>
                    <td>{{ $grant->grant_start_date }}</td>
                    <td>{{ $grant->duration }}</td>
                    <td>{{ $grant->pivot->role }}</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        @endif


        <a href="{{ route('academicians.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection