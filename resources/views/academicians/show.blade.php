@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Academician Details</h1>
        <div class="card">
            <div class="card-header">
                <h2>{{ $academician->name }}</h2>
            </div>
            <div class="card-body">
                <p><strong>Staff Number:</strong> {{ $academician->staff_number }}</p>
                <p><strong>Email:</strong> {{ $academician->email }}</p>
                <p><strong>Collage:</strong> {{ $academician->collage }}</p>
                <p><strong>Department:</strong> {{ $academician->department }}</p>
                <p><strong>Position:</strong> {{ $academician->position }}</p>
            </div>
        </div>
        <a href="{{ route('academicians.index') }}" class="btn btn-primary mt-3">Back to List</a>
    </div>
@endsection