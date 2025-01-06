<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('Welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/settings', [App\Http\Controllers\SettingsController::class, 'index'])->name('settings.index');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/grants', GrantController::class);
Route::resource('/milestones', MilestoneController::class);
Route::resource('/academicians', AcademicianController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/error403', function () {
    return view('errors.403')
        ->with('error', '403')
        ->with('message', 'You are not authorized to access this page.');
});

Route::get('/calendar/milestones', [CalendarController::class, 'milestones'])->name('calendar.milestones');


Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
});

