@extends('layouts.master')

@section('content')
<!--begin::App Main-->
<main class="app-main d-flex justify-content-center">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row justify-content-center">
                <div class="col-sm-6 text-center"><h3 class="mb-0">Dashboard</h3></div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row justify-content-center">
                <!--begin::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 1-->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ \App\Models\Academician::count() }}</h3>
                            <p>Total Academician</p>
                        </div>
                        <svg
                            class="small-box-icon"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                            d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z"

                            ></path>
                        </svg>
                        
                        <a
                            href="{{ route('academicians.create') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                        >@can('isAdmin')
                            Create Academician <i class="bi bi-link-45deg"></i>
                        @endcan</a>
                        
                    </div>
                    <!--end::Small Box Widget 1-->
                </div>
                <!--end::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 2-->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ \App\Models\Grant::count() }}</h3>
                            <p>Total Grant</p>
                        </div>
                        <svg
                            class="small-box-icon"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path
                                d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75zM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 01-1.875-1.875V8.625zM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 013 19.875v-6.75z"
                            ></path>
                        </svg>
                        <a
                        
                            href="{{ route('grants.create') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                        >
                        @can('isAdmin')
                            Create Grant <i class="bi bi-link-45deg"></i>
                            @endcan
                        </a>
                        
                    </div>
                    <!--end::Small Box Widget 2-->
                </div>
                <!--end::Col-->
                <div class="col-lg-3 col-6">
                    <!--begin::Small Box Widget 3-->
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ \App\Models\Milestone::count() }}</h3>
                            <p>Total Milestone</p>
                        </div>
                        <svg
                            class="small-box-icon"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true"
                        >
                            <path                                 
                            d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z"
                            >

                            

                        </path>
                        </svg>
                        <a
                            href="{{ route('milestones.create') }}"
                            class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
                        >
                        @can('isAdmin')
                            Add Milestone <i class="bi bi-link-45deg"></i>
                        @endcan</a>
                    </div>
                    <!--end::Small Box Widget 3-->
                </div>

                @can('isAdmin')
                <div class="row justify-content-center">
                <!-- Chart Section -->
                <div class="col-lg-4 col-md-12 mb-3">
                <div class="card h-100">
                    <div class="card-header">
                        <h3 class="card-title">Milestone Status</h3>
                    </div>
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <canvas id="milestoneChart" style="max-height: 300px;"></canvas>
                    </div>
                </div>
            </div>

                <!-- Upcoming Deadlines Section -->
                <div class="col-lg-4 col-md-12 mb-3">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="card-title">Upcoming Deadlines</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($upcomingDeadlines as $deadline)
                                    <li class="list-group-item">
                                        <strong>{{ $deadline->milestone_title }}</strong>
                                        <span class="badge bg-primary float-end">{{ $deadline->completion_date->format('d M Y') }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
                <!--end::Col-->

<!-- ...existing code... -->
            </div>
            <!--end::Row-->
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('milestoneChart').getContext('2d');
        var milestoneChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Pending', 'In Progress', 'Completed'],
                datasets: [{
                    data: [{{ $pendingMilestones }}, {{ $inProgressMilestones }}, {{ $completedMilestones }}],
                    backgroundColor: ['#FF6384', '#FFCE56', '#36A2EB'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw;
                                return label;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
