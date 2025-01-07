<?php

namespace App\Http\Controllers;
use App\Models\Academician;
use App\Models\Grant;
use App\Models\Milestone;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
//use App\Models\Activity;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // $user = Auth::user();
        // $upcomingDeadlinesQuery = Milestone::where('completion_date', '>', now())->orderBy('completion_date');

        // if (Gate::allows('isAdmin') || Gate::allows('isStaff')) {
        //     // Admin and staff see all upcoming deadlines
        //     $upcomingDeadlines = $upcomingDeadlinesQuery->take(10)->get(['milestone_title', 'completion_date']);
        // } else {
        //     // Academician sees only the milestones they are involved in through grants
        //     $upcomingDeadlines = $upcomingDeadlinesQuery->whereHas('grant.users', function ($query) use ($user) {
        //         $query->where('user_id', $user->id);
        //     })->take(10)->get(['milestone_title', 'completion_date']);
        // }
        $totalGrants = Grant::count();
        $totalMilestones = Milestone::count();
        $totalUsers = User::count();
        //$recentActivities = Activity::orderBy('created_at', 'desc')->take(10)->get();
        
        $upcomingDeadlines = Milestone::where('completion_date', '>', now())->orderBy('completion_date')->take(10)->get(['milestone_title', 'completion_date']);

            $pendingMilestones = \App\Models\Milestone::where('status', 'Pending')->count();
            $inProgressMilestones = \App\Models\Milestone::where('status', 'In Progress')->count();
            $completedMilestones = \App\Models\Milestone::where('status', 'Completed')->count();
        

        return view('dashboard', compact('totalGrants', 'totalMilestones', 'totalUsers', 'upcomingDeadlines', 'pendingMilestones','inProgressMilestones', 'completedMilestones'));
    }
}