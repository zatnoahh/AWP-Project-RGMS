@extends('layouts.app')
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
        <a href="{{ route('grants.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection
