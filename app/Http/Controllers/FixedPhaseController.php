<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FixedPhase;


class FixedPhaseController extends Controller
{
    public function index()
    {
        $fixedPhases = FixedPhase::all();
        return view('fixed_phases.index', compact('fixedPhases'));
    }

    public function create()
    {
        return view('fixed_phases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_type' => 'required|integer',
            'phase_name' => 'required|string|max:255',
        ]);

        FixedPhase::create($request->only('project_type', 'phase_name'));

        return redirect()->route('fixed_phases.index')->with('success', 'Fixed phase created successfully.');
    }

    public function edit($id)
    {
        $fixedPhase = FixedPhase::findOrFail($id);
        return view('fixed_phases.edit', compact('fixedPhase'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'project_type' => 'required|integer',
            'phase_name' => 'required|string|max:255',
        ]);

        $fixedPhase = FixedPhase::findOrFail($id);
        $fixedPhase->update($request->only('project_type', 'phase_name'));

        return redirect()->route('fixed_phases.index')->with('success', 'Fixed phase updated successfully.');
    }

    public function destroy($id)
    {
        $fixedPhase = FixedPhase::findOrFail($id);
        $fixedPhase->delete();

        return redirect()->route('fixed_phases.index')->with('success', 'Fixed phase deleted successfully.');
    }

    public function getFixedPhases($projectType)
    {
        $fixedPhases = FixedPhase::where('project_type', $projectType)->get();
        return response()->json($fixedPhases);
    }
}
