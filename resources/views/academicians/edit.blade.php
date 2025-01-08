@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Academician</h1>
    <form method="POST" action="{{ route('academicians.update', $academician->id) }}">
        @method('PUT')
        @csrf       
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $academician->name }}" required>
        </div>
        <div class="form-group">
            <label for="staff_number">Staff Number:</label>
            <input type="text" class="form-control" id="staff_number" name="staff_number" value="{{ $academician->staff_number }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $academician->email }}" required>
        </div>
        <div class="form-group">
            <label for="college">College:</label>
            <input type="text" class="form-control" id="college" name="college" value="{{ $academician->college }}" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" class="form-control" id="department" name="department" value="{{ $academician->department }}" required>
        </div>
        <div class="form-group">
            <label for="position">Position:</label>
            <input type="text" class="form-control" id="position" name="position" value="{{ $academician->position }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Academician</button>
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