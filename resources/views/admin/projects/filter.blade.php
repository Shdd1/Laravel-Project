@extends('layouts.app')

@section('title', 'Filtered Projects')

@section(section: 'content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container">
    <h1>Filtered Projects</h1>
    <form action="{{ route('projects.filter') }}" method="GET" class="mb-3">
        <div class="mb-3">
            <label for="project_type" class="form-label">Project Type</label>
            <select class="form-select" id="project_type" name="project_type" required>
    <option value="">Select Project Type</option>
    <option value="all" {{ request('project_type') == 'all' ? 'selected' : '' }}>جميع الأنواع</option>
    <option value="1" {{ request('project_type') == '1' ? 'selected' : '' }}>تكييف</option>
    <option value="2" {{ request('project_type') == '2' ? 'selected' : '' }}>كهرباء</option>
    <option value="3" {{ request('project_type') == '3' ? 'selected' : '' }}>سباكة</option>
</select>


        </div>
        <button type="submit" class="btn btn-info">Filter</button>
    </form>

    @if ($projects->isEmpty())
        <div class="alert alert-info">
            No projects found.
        </div>
    @else
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <form action="{{ route('projects.updateProgress') }}" method="POST">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Project Name</th>
                        <th>Client Name</th>
                    
                        <!-- Loop through the phases to display them as columns -->
                        @foreach ($fixedPhases as $phase)
                            <th>{{ $phase->phase_name }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->client_name }}</td>
                

                            <!-- Loop through phases for each project -->
                            @foreach ($fixedPhases as $phase)
                                <td>
                                <input 
    type="number" 
    name="progress[{{ $project->id }}][{{ $phase->id }}]" 
    value="{{ $project->phases->where('fixed_phase_id', $phase->id)->first()->progress_percentage ?? 0 }}" 
    min="0" max="100"
    class="form-control"
    placeholder="Progress (%)"
>

                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn btn-info">Update Progress</button>
            
        </form>
    @endif
</div>
@endsection
