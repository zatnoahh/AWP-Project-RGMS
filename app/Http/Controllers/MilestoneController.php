<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $milestones = Milestone::all();
        return view('milestones.index',compact('milestones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grants = Grant::all();
        return view('milestones.create', compact('grants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grant_id' => 'required',
            'milestone_title' => 'required',
            'completion_date' => 'required',
            'deliverable' => 'required',
            'status' => 'required',
            'remarks' => 'required',
            'date_updated' => 'required',
            
        ]);

        Milestone::create($request->all());

        return redirect()->route('milestones.index')
            ->with('success','Milestone created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        return view('milestones.show', compact('milestone'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        return view('milestones.edit',compact('milestone'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        $request->validate([
            'grant_id' => 'required',
            'milestone_title' => 'required',
            'completion_date' => 'required',
            'deliverable' => 'required',
            'status' => 'required',
            'remarks' => 'required',
            'date_updated' => 'required',
        ]);

        $milestone->update($request->all());

        return redirect()->route('milestones.index')
            ->with('success','Milestone updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();

        return redirect()->route('milestones.index')
            ->with('success','Milestone deleted successfully');
    }
}
