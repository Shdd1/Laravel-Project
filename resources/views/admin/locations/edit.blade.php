@extends('layouts.app')

@section('title', 'Edit Location')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="container mt-5">
    <h1 class="mb-4 text-center">Edit Location</h1>

    <form action="{{ route('admin.locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name" class="form-label">Location Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $location->name }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Location</button>
    </form>
</div>
@endsection
