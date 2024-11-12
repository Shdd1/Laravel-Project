@extends('layouts.app')

@section('title', 'Edit Overtime Request')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Overtime Request</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.overtimes.update', $overtime->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="hours" class="form-label">Overtime Hours</label>
            <input type="number" step="0.01" class="form-control" name="hours" id="hours" value="{{ $overtime->hours }}" required>
            <div class="invalid-feedback">Please enter the number of hours.</div>
        </div>

        <div class="form-group mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" id="status" required>
                <option value="pending" {{ $overtime->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $overtime->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="rejected" {{ $overtime->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="under_review" {{ $overtime->status == 'under_review' ? 'selected' : '' }}>Under Review</option>
            </select>
            <div class="invalid-feedback">Please select a valid status.</div>
        </div>

        <button type="submit" class="btn btn-success">Update Request</button>
    </form>
</div>
@endsection
