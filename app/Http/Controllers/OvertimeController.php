<?php

namespace App\Http\Controllers;

use App\Models\Overtime;
use App\Models\Location;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OvertimeController extends Controller
{
    
    public function create()
    {
       
    $locations = Location::all();
    $projects = Project::all();

    return view('overtimes.create', compact('locations', 'projects'));
    }
    public function index()
    {
        $overtimes = Overtime::with(['project', 'location'])->get(); 
        return view('overtimes.index', compact('overtimes'));
    }

  
    public function store(Request $request)
{
  
    $request->validate([
        'hours' => 'required|numeric|min:0.5',
        'date' => 'required|date',
        'reason' => 'required|string|max:255',
        'location_id' => 'required|exists:locations,id',
        'project_id' => 'required|exists:projects,id',
    ]);

    
    Overtime::create([
        'user_id' => Auth::id(),
        'hours' => $request->hours,
        'date' => $request->date,
        'reason' => $request->reason,
        'location_id' => $request->location_id, 
        'project_id' => $request->project_id,   
        'status' => 'pending',
    ]);

        return redirect()->route('overtimes.create')->with('success', 'Overtime request submitted successfully!');
    }

     
     public function adminIndex()
     {
         $overtimes = Overtime::with('user')->get(); // جلب الطلبات مع بيانات المستخدمين
         return view('admin.overtimes.index', compact('overtimes'));
     }
     
     
     
 
     
     public function edit(Overtime $overtime)
     {
         return view('admin.overtimes.edit', compact('overtime'));
     }
 
     public function update(Request $request, Overtime $overtime)
     {
         $request->validate(rules: [
             'hours' => 'required|numeric|min:0.5',
             'status' => 'required|in:pending,accepted,rejected,under_review',
         ]);
 
         $overtime->update(attributes: [
             'hours' => $request->hours,
             'status' => $request->status,
         ]);
 
         return redirect()->route(route: 'admin.overtimes.index')->with('success', 'Overtime request updated successfully!');
     }
}

