<?php

namespace App\Http\Controllers;

use App\Models\Academician;
use App\Models\User;
use Illuminate\Http\Request;

class AcademicianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicians = Academician::all();
        return view('academicians.index',compact('academicians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('academicians.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

        Academician::create($request->all());

        return redirect()->route('academicians.index')
            ->with('success','Academician created successfully.');
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
