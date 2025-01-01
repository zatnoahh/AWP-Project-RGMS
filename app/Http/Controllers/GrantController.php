<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\Grant;
use App\Models\Academician;
use App\Models\AcademicianGrant;
use Illuminate\Http\Request;

class GrantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $user = Auth::user();
    Log::info('User Info', ['user' => $user]);

    // Admin and staff can view all grants
    if ($user->userCategory === 'admin' || $user->userCategory === 'staff') {
        $grants = Grant::all();
        // dd($grants);

    } 
    // Academician-specific logic
    elseif ($user->userCategory === 'academician') {
        // Check if the user is a Project Leader
        //$grants = Grant::all()

        $grants = Grant::whereHas ('academicians', function ($query) {
            $query->where('user_id', Auth::user()->id)
                  ->where('role','Project Leader');
        })->get();
        // dd($grants);

        
    } 
    // Other users cannot view any grants
    else {
        $grants = collect();
    }

    Log::info('Grants for User', ['grants' => $grants]);

    $totalGrants = $grants->count();
    return view('grants.index', compact('grants', 'totalGrants'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grants = Grant::all();
        // Fetch all academicians who are not project leaders
        $academicians = Academician::whereDoesntHave('grants', function ($query) {
            $query->where('role', 'Project Leader');
        })->get();

        // Return the grant creation form view
        return view('grants.create', compact('academicians'));
        return view('milestones.create', compact('grants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'grant_title' => 'required',
            'project_leader' => 'required|exists:academicians,id',
            'grant_provider' => 'required',
            'grant_amount' => 'required',
            'description' => 'required',
            'grant_start_date' => 'required',
            'duration' => 'required',

            'members' => 'nullable|array',
            'members.*' => 'exists:academicians,id',
        ]);


        // Create the grant (assuming you have other fields to save)
        $grant = Grant::create([
            'grant_title' => $request->grant_title,
            'grant_provider' => $request->grant_provider,
            'grant_amount' => $request->grant_amount,
            'description' => $request->description,
            'grant_start_date' => $request->grant_start_date,
            'duration' => $request->duration,
        ]);

        // Attach the members to the grant
        if ($request->has('members')) {
                    foreach ($request->members as $memberId) {
                        $grant->academicians()->attach($memberId, ['role' => 'Member']);
                    }
        }

         // Create the entry in the academician_grant table
         AcademicianGrant::create([
            'grant_id' => $grant->id,
            'academician_id' => $request->project_leader,
            'role' => 'Project Leader',
        ]);

        if (in_array($request->project_leader, $request->members)) {
            return back()->with('error', 'The project leader cannot be a member of the same grant.');
        }
        

        

        return redirect()->route('grants.index')->with('success', 'Grant created successfully!');
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
        $academicians = Academician::all();
        return view('grants.edit', compact('grant', 'academicians'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'provider' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'description' => 'required|string',
        'duration' => 'required|numeric',
    ]);

    $grant = Grant::findOrFail($id);
    $grant->grant_title = $request->input('title');
    $grant->grant_provider = $request->input('provider');
    $grant->grant_amount = $request->input('amount');
    $grant->description = $request->input('description');
    $grant->duration = $request->input('duration');
    $grant->save();

    return redirect()->route('grants.index')->with('success', 'Grant updated successfully');
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
