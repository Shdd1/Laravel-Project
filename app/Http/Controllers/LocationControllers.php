<?php

namespace App\Http\Controllers;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationControllers extends Controller
{
  
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }


    public function create()
    {
        return view('admin.locations.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Location::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.locations.index')->with('success', 'Location added successfully!');
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

  
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $location->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.locations.index')->with('success', 'Location updated successfully!');
    }


    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('admin.locations.index')->with('success', 'Location deleted successfully!');
    }  
}
