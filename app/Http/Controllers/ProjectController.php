<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\FixedPhase;
use App\Models\Phase;
use App\Models\Overtime;
use Illuminate\Support\Facades\DB;
class ProjectController extends Controller
{
   
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }


    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'client_name' => 'required|string|max:255',
        'project_type' => 'required|integer|in:1,2,3',
        'phases' => 'array', 
    ]);
    $project = Project::create($request->only('name', 'client_name', 'project_type'));
    if ($request->has('phases')) {
        foreach ($request->phases as $phaseData) {
            $project->phases()->create($phaseData);
        }
    }

    return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
}
public function getFixedPhases($projectType)
{
    $fixedPhases = FixedPhase::where('project_type', $projectType)->get();
    return response()->json($fixedPhases);
}
public function filter(Request $request)
{
    $projectType = $request->input('project_type');

    //  بناءً على النوع المحدد أو جميع المشاريع
    if ($projectType === 'all' || !$projectType) {
        $projects = Project::all(); // استرجاع جميع المشاريع
    } else {
        $projects = Project::where('project_type', $projectType)->get();
    }

    //  المراحل الثابتة لنوع المشروع المحدد
    $fixedPhases = FixedPhase::where('project_type', $projectType)->get();

    return view('admin.projects.filter', compact('projects', 'fixedPhases', 'projectType'));
}


public function updateProgress(Request $request)
{
    $request->validate([
        'progress.*.*' => 'required|integer|min:0|max:100', 
    ]);
    foreach ($request->input('progress') as $projectId => $phases) {
        foreach ($phases as $phaseId => $percentage) {
            $phase = Phase::where('project_id', $projectId)
                          ->where('fixed_phase_id', $phaseId)
                          ->first();
            if ($phase) {
                $phase->progress_percentage = $percentage;
                $phase->save(); 
            } else {
                Phase::create([
                    'project_id' => $projectId,
                    'fixed_phase_id' => $phaseId,
                    'progress_percentage' => $percentage,
                ]);
            }
        }
    }
    return redirect()->route('projects.filter', ['project_type' => $request->input('project_type')])
                     ->with('success', 'Progress updated successfully.');
}

public function edit(Project $project)
{
    $project->load('phases.fixedPhase');
    return view('admin.projects.edit', compact('project'));
}

public function update(Request $request, Project $project)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'client_name' => 'required|string|max:255',
        'project_type' => 'required|integer|in:1,2,3',
        'phases' => 'array',
        'phases.*.progress_percentage' => 'required|integer|min:0|max:100',
    ]);

    DB::transaction(function () use ($request, $project) {
        $typeChanged = (int) $request->project_type !== (int) $project->project_type;

        $project->update($request->only('name', 'client_name', 'project_type'));

        if ($typeChanged) {
            // the old phases belong to the previous project type, so they no longer apply
            $project->phases()->delete();
            return;
        }

        foreach ($request->input('phases', []) as $phaseId => $phaseData) {
            $project->phases()
                ->where('id', $phaseId)
                ->update(['progress_percentage' => $phaseData['progress_percentage']]);
        }
    });

    return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
}

public function destroy(Project $project)
{
    if (Overtime::where('project_id', $project->id)->exists()) {
        return redirect()->route('admin.projects.index')
            ->with('error', 'This project has overtime requests and cannot be deleted.');
    }

    DB::transaction(function () use ($project) {
        $project->phases()->delete();
        $project->delete();
    });

    return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
}

}
