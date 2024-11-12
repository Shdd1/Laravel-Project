@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container">
    <h1>Edit Project: {{ $project->name }}</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $project->name }}" required>
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">Client Name</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ $project->client_name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="project_type" class="form-label">Project Type</label>
            <select class="form-select" id="project_type" name="project_type" required>
                <option value="1" {{ $project->project_type == 1 ? 'selected' : '' }}>تكييف</option>
                <option value="2" {{ $project->project_type == 2 ? 'selected' : '' }}>كهرباء</option>
                <option value="3" {{ $project->project_type == 3 ? 'selected' : '' }}>سباكة</option>
            </select>
        </div>
        
        <h3>Phases</h3>
        <div id="phases">
            @foreach ($project->phases as $phase)
                <div class="mb-3">
                    <input type="hidden" name="phases[{{ $phase->id }}][fixed_phase_id]" value="{{ $phase->fixed_phase_id }}">
                    <input type="text" class="form-control" value="{{ $phase->fixedPhase->phase_name }}" readonly>
                    <input type="number" class="form-control" name="phases[{{ $phase->id }}][progress_percentage]" value="{{ $phase->progress_percentage }}" min="0" max="100" required>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update Project</button>
    </form>
</div>
@endsection
