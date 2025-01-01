<?php

namespace App\Http\Controllers;
use App\Models\Grant;
use App\Models\Academician;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    public function index()
    {
        if(Gate::allows('isAcademician')){
            $grants = Grant::whereHas ('academicians', function ($query) {
                $query->where('user_id', Auth::user()->id)
                      ->where('role','Member');
            })->get();
        }
        return view('projects.index', compact('grants'));
    }
}
