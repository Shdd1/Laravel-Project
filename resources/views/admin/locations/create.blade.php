@extends('layouts.app')

@section('title', 'Add New Location')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Add New Location</h1>

    <form action="{{ route('admin.locations.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name" class="form-label">Location Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Location</button>
    </form>
</div>
@endsection
