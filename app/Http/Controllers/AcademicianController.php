<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicians = Academician::all();
        $totalAcademicians = $academicians->count();

        return view('academicians.index', compact('academicians', 'totalAcademicians'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('academicians.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'staff_number' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        // Step 1: Create the user with default password "0000"
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('0000'),  // Default password "0000"
        ]);

        // Step 2: Create the academician and associate the user_id
        $academician = Academician::create([
            'name' => $request->name,
            'staff_number' => $request->staff_number,
            'email' => $request->email,
            'college' => $request->college,
            'department' => $request->department,
            'position' => $request->position,
            'user_id' => $user->id,  // Automatically associate user_id
        ]);

        // Redirect or return response
        return redirect()->route('academicians.index')->with('success','Academician created successfully');
    }




    /**
     * Display the specified resource.
     */
    public function show(Academician $academician)
    {
        return view('academicians.show', compact('academician'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Academician $academician)
    {
        return view('academicians.edit',compact('academician'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Academician $academician)
    {
        $request->validate([
            'name' => 'required',
            'staff_number' => 'required',
            'email' => 'required',
            'collage' => 'required',
            'department' => 'required',
            'position' => 'required',
            'user_id' => 'required',
        ]);

        $academician->update($request->all());

        return redirect()->route('academicians.index')
            ->with('success','Academician updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academician $academician)
    {
        $academician->delete();

        return redirect()->route('academicians.index')
            ->with('success','Academician deleted successfully');
    }
}
