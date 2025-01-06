<?php

namespace App\Http\Controllers;
use App\Models\Academician;
use App\Models\Grant;
use App\Models\Milestone;
use App\Models\User;
//use App\Models\Activity;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalGrants = Grant::count();
        $totalMilestones = Milestone::count();
        $totalUsers = User::count();
        //$recentActivities = Activity::orderBy('created_at', 'desc')->take(10)->get();
        $upcomingDeadlines = Milestone::where('completion_date', '>', now())->orderBy('completion_date')->take(10)->get();

        return view('dashboard', compact('totalGrants', 'totalMilestones', 'totalUsers', 'upcomingDeadlines'));
    }
}