

@extends('layouts.app')

@section('title', 'All Projects')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="container">
    <h1>All Projects</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('projects.filter') }}" method="GET" class="mb-3">
        <div class="mb-3">
            <label for="project_type" class="form-label">Project Type</label>
            <select class="form-select" id="project_type" name="project_type" required>
                <option value="">Select Project Type</option>
                <option value="all">جميع الأنواع</option> 
                <option value="1">تكييف</option>
                <option value="2">كهرباء</option>
                <option value="3">سباكة</option>
            </select>
        </div>
        <button type="submit" class="btn btn-info">Filter</button>
    </form>

    @if ($projects->isEmpty())
        <div class="alert alert-info">
            No projects found.
        </div>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Client Name</th>
                    <th>Project Type</th>
                    <th>Phases</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->client_name }}</td>
                        <td>
                            @if ($project->project_type == 1)
                                تكييف
                            @elseif ($project->project_type == 2)
                                كهرباء
                            @elseif ($project->project_type == 3)
                                سباكة
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('projects.filter', ['project_type' => $project->project_type]) }}" class="btn btn-info">View Phases</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this project?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
