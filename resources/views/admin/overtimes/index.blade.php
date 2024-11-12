@extends('layouts.app')

@section('title', 'Manage Overtime Requests')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Manage Overtime Requests</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($overtimes->isEmpty())
        <div class="alert alert-info">
            No overtime requests found.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Employee Name</th>
                        <th>Project</th> 
                        <th>Location</th> 
                        <th>Hours</th>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($overtimes as $overtime)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $overtime->user->name }}</td> 
                            <td>{{ $overtime->project->name ?? 'N/A' }}</td> 
                            <td>{{ $overtime->location->name ?? 'N/A' }}</td> 
                            <td>{{ $overtime->hours }}</td>
                            <td>{{ $overtime->date }}</td>
                            <td>{{ $overtime->reason }}</td>
                            <td>{{ ucfirst($overtime->status) }}</td>
                            <td>
                                <a href="{{ route('admin.overtimes.edit', $overtime->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
