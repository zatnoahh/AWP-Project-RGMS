<?php

namespace App\Http\Controllers;

use App\Models\Grant;
use App\Models\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if (Gate::allows('isAdmin') || Gate::allows('isStaff')) {
            $milestones = Milestone::all();
        } elseif (Gate::allows('isAcademician')) {
            // Academicians can see only the milestones for the grants they are involved in
            $grants = Grant::whereHas('academicians', function ($query) {
            $query->where('user_id', Auth::user()->id);
            })->pluck('id');

            $milestones = Milestone::whereIn('grant_id', $grants)->get();
        } else {
            // Default to no milestones if the user category is not recognized
            $milestones = collect();
        }

        return view('milestones.index', compact('milestones'));

        // i want admin and staff can see all the milestone, but for academician , they can see all the milestone on the grant they involved only
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
            'grant_id' => 'required|exists:grants,id',
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
        $grants = Grant::all();
        return view('milestones.show', compact('milestone', 'grants'));
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
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'completion_date' => 'required|date',
            'deliverable' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'remarks' => 'nullable|string',
            'date_updated' => 'required|date',
        ]);

        $milestone = Milestone::findOrFail($id);
        $milestone->completion_date = $request->completion_date;
        $milestone->deliverable = $request->deliverable;
        $milestone->status = $request->status;
        $milestone->remarks = $request->remarks;
        $milestone->date_updated = $request->date_updated;
        $milestone->save();

        return redirect()->route('milestones.index')->with('success', 'Milestone updated successfully');
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
