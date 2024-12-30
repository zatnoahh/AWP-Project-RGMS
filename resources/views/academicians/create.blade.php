@extends('layouts.master')
@section('content')


<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Create A New Academician</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('academicians.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="staff_number">Staff Number:</label>
                        <input type="text" class="form-control" id="staff_number" name="staff_number" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="college">College:</label>
                        <input type="text" class="form-control" id="college" name="college" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="department">Department:</label>
                        <input type="text" class="form-control" id="department" name="department" required>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="position">Position:</label>
                        <select class="form-control" id="position" name="position" required>
                            <option value="" disabled selected>Please select a position</option>
                            <option value="Professor">Professor</option>
                            <option value="Assoc Prof">Assoc Prof</option>
                            <option value="Senior Lecturer">Senior Lecturer</option>
                            <option value="Lecturer">Lecturer</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center mt-4">
                    <div class="col-md-6 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('academicians.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection