<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
        public function index()
        {
            if (Gate::denies('isAdmin') && Gate::denies('isStaff')) {
                return view('errors.403');
            } else {
                $academicians = Academician::all();
                $totalAcademicians = $academicians->count();

                return view('academicians.index', compact('academicians', 'totalAcademicians'));
            }
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
            'staff_number' => $request->staff_number,
            'password' => Hash::make('0000'),  // Default password "0000"
            'userCategory' => 'academician',
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'staff_number' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'college' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'position' => 'required|string|max:255',
        ]);

        $academician = Academician::findOrFail($id);
        $academician->name = $request->input('name');
        $academician->staff_number = $request->input('staff_number');
        $academician->email = $request->input('email');
        $academician->college = $request->input('college');
        $academician->department = $request->input('department');
        $academician->position = $request->input('position');
        $academician->save();

        return redirect()->route('academicians.index')->with('success', 'Academician updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Academician $academician)
    {
        // Delete the associated user
        $user = User::find($academician->user_id);
        if ($user) {
            $user->delete();
        }

        // Delete the academician
        $academician->delete();

        return redirect()->route('academicians.index')
            ->with('success', 'Academician and associated user deleted successfully');
    }
}
