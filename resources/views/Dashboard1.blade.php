@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    
    <!-- Summary Statistics -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Grants</h5>
                    <p class="card-text">{{ $totalGrants }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Milestones</h5>
                    <p class="card-text">{{ $totalMilestones }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
    </div>



    <!-- Upcoming Deadlines -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Upcoming Deadlines</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($upcomingDeadlines as $deadline)
                            <li class="list-group-item">{{ $deadline->milestone_title }} - {{ $deadline->completion_date->format('Y-m-d') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Calendar -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Calendar</div>
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Links -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quick Links</div>
                <div class="card-body">
                    <a href="{{ route('grants.create') }}" class="btn btn-primary">Create New Grant</a>
                    <a href="{{ route('milestones.create') }}" class="btn btn-secondary">Create New Milestone</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.10.1/main.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            events: '{{ route('calendar.milestones') }}'
        });

        calendar.render();
    });
</script>
@endsection