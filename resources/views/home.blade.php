@extends('layouts.master')

@section('content')
<style>
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('HOME') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="welcome-message">
                        Welcome to the Research Grant Management System
                    </div>
                    <p>You are logged in!</p>

                    
                    <div class="card mt-4">
                        <div class="card-header">Go to Dashboard</div>
                        <div class="card-body">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection