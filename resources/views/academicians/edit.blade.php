@extends('layouts.master')

@section('content')
    <div class="container">
        <h2>Edit Academician</h2>
        <form method="POST" action="{{ route('academicians.update', $academician->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ $academician->name }}">
            </div><div class="form-group">
                <label>Staff Number:</label>
                <input type="text" class="form-control" placeholder="Enter staff number" name="staff_number" value="{{ $academician->staff_number }}">
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ $academician->email }}">
            </div>
            <div class="form-group">
                <label>College:</label>
                <input type="text" class="form-control" placeholder="Enter college" name="college" value="{{ $academician->college }}">
            </div>
            <div class="form-group">
                <label>Department:</label>
                <input type="text" class="form-control" placeholder="Enter department" name="department" value="{{ $academician->department }}">
            </div>
            <div class="form-group">
                        <label for="position">Position:</label>
                        <select class="form-control" id="position" name="position" required>
                            <option value="{{ $academician->position }}" selected>{{ $academician->position }}</option>
                            <option value="Professor">Professor</option>
                            <option value="Assoc Prof">Assoc Prof</option>
                            <option value="Senior Lecturer">Senior Lecturer</option>
                            <option value="Lecturer">Lecturer</option>
                        </select>
                    </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <a href="{{ route('academicians.index') }}" class="btn btn-secondary mt-3">Back to Academicians</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const positionSelect = document.getElementById('position');
            const currentPosition = positionSelect.value;
            const options = positionSelect.options;

            for (let i = 0; i < options.length; i++) {
                if (options[i].value === currentPosition) {
                    options[i].disabled = true;
                    options[i].style.color = 'gray';
                }
            }
        });
    </script>
@endsection