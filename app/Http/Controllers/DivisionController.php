<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Service;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisions = Division::with('services')->orderBy('id_division', 'desc')->get();

        return view('layout.Division.index', compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $services = Service::all();
        return view('layout.Division.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'lable' => 'required|string|max:255',
            'id_service' => 'required|array',
            'id_service.*' => 'exists:services,id_service',
        ]);

        $division = Division::create([
            'lable' => $request->input('lable'),
        ]);

        $services = $request->input('id_service', []);
        $division->services()->attach($services);

        return redirect()->route('divisions.index')->with('success', 'Division created successfully.');
    }




    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        $division = Division::findOrFail($division->id_division);

        return view('layout.Division.show', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        $services = Service::all();
        return view('layout.Division.edit', compact('division', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Division $division)
    {
        $request->validate([
            'lable' => 'required|string|max:255',
            'id_service' => 'required|array',
            'id_service.*' => 'exists:services,id_service',
        ]);

        $division->update([
            'lable' => $request->input('lable'),
        ]);

        $services = $request->input('id_service', []);
        $division->services()->sync($services);

        return redirect()->route('divisions.index')->with('success', 'Division updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->services()->detach();
        $division->delete();

        return redirect()->route('divisions.index')->with('success', 'Division deleted successfully.');
    }
}
