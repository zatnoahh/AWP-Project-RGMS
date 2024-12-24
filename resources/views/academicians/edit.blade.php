@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Edit Academicians </h1>
    <form   method="POST" action="{{ route('academicians.update', $academician->id) }}">
        @method('PUT')
        @csrf 
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $academician->name }}">
            </div>
            <div class="form-group">
                <label>Staff Number:</label>
                <input type="text" class="form-control" placeholder="Enter staff number" name="staff_number" value="{{ $academician->staff_number }}">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $academician->email }}">
            </div>
            <div class="form-group">
                <label>Collage:</label>
                <input type="text" class="form-control" placeholder="Enter collage" name="collage" value="{{ $academician->collage }}">
            </div>
            <div class="form-group">
                <label>Department:</label>
                <input type="text" class="form-control" placeholder="Enter department" name="department" value="{{ $academician->department }}">
            </div>
            <div class="form-group">
                <label>Position:</label>
                <input type="text" class="form-control" placeholder="Enter position" name="position" value="{{ $academician->position }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('academicians.index') }}" class="btn btn-secondary mt-3">Back to Academicians</a>
    </div>
@endsection