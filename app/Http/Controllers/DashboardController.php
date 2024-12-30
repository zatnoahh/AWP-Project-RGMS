<?php

namespace App\Http\Controllers;
use App\Models\Academician;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAcademicians = Academician::count();
        return view('dashboard',compact('totalAcademicians'));
    }
}