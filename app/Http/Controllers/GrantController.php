<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grants = Grant::all();
        return view('grants.index',compact('grants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grants = Grant::all();
        return view('grants.create');
        return view('milestones.create', compact('grants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grant_title' => 'required',
            'grant_provider' => 'required',
            'grant_amount' => 'required',
            'description' => 'required',
            'grant_start_date' => 'required',
            'duration' => 'required',
        ]);

        Grant::create($request->all());

        return redirect()->route('grants.index')
            ->with('success','Grant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grant $grant)
    {
        return view('grants.show', compact('grant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grant $grant)
    {
        return view('grants.edit',compact('grant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grant $grant)
    {
        $request->validate([
            'grant_title' => 'required',
            'grant_provider' => 'required',
            'grant_amount' => 'required',
            'description' => 'required',
            'grant_start_date' => 'required',
            'duration' => 'required',
        ]);

        $grant->update($request->all());

        return redirect()->route('grants.index')
            ->with('success','Grant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grant $grant)
    {
        $grant->delete();

        return redirect()->route('grants.index')
            ->with('success','Grant deleted successfully'); 
    }
}
