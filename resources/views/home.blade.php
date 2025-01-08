@extends('layouts.master')

@section('content')
<style>
    body {
        background-color: #FFE5B4;
    }
    .card-header {
        background-color: #007bff;
        color: white;
    }
    .card-body {
        background-color: #f8f9fa;
    }
    .welcome-message {
        font-size: 1.5rem;
        font-weight: bold;
    }
    .quick-links ul {
        list-style-type: none;
        padding: 0;
    }
    .quick-links li {
        margin: 10px 0;
    }
    .quick-links a {
        text-decoration: none;
        color: #007bff;
    }
    .quick-links a:hover {
        text-decoration: underline;
    }
</style>

        
    <div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
        <!-- System Name -->
        <div class="text-center mb-5">
            <h1 class="display-4 fw-bold">Research Grant Management System</h1>
            <p class="lead text-muted">Efficiently manage grants, milestones, and research deliverables.</p>
        </div>

        <!-- Navigation Section -->
        <div class="row w-100 justify-content-center">
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card text-center h-100 shadow-sm">
                    <img src="dist\assets\img\grants.jpg" class="card-img-top" alt="Grants" style="height: 200px; object-fit: cover;">
                    <h5 class="card-title text-center"><strong>Grants</strong></h5>
                    <div class="card-body">  
                        <p class="card-text">Manage and track all research grants effectively.</p>
                        <a href="/grants" class="btn btn-primary">View Grants</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="card text-center h-100 shadow-sm">
                    <img src="dist\assets\img\milestone.jpg" class="card-img-top" alt="Milestones" style="height: 200px; object-fit: cover;">
                    <h5 class="card-title text-center"><strong>Milestones</strong></h5>
                    <div class="card-body">
                        <p class="card-text">Stay updated on research milestones and deadlines.</p>
                        <a href="/milestones" class="btn btn-primary">View Milestones</a>
                    </div>
                </div>
            </div>
            <div class="card text-center">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-body">
                    <p class="card-text">Access your personalized dashboard to monitor research activities.</p>
                    <a href="/dashboard" class="btn btn-primary">View Dashboard</a>
                </div>
                <div class="card-footer text-body-secondary">
                </div>
            </div>
        </div>
        
        <!-- Footer Section -->
        <footer class="mt-auto text-muted text-center py-3">
            <small>&copy; 2025 Research Grant Management System. All rights reserved.</small>
        </footer>
    </div>



@endsection