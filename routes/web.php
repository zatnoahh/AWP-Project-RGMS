<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\AcademicianController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/grants', GrantController::class);
Route::resource('/milestones', MilestoneController::class);
Route::resource('/academicians', AcademicianController::class);



