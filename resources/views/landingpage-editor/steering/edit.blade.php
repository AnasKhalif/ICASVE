@extends('layouts.app')
@section('title', 'Edit Steering Committee')
@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold">Edit Steering Committee</h2>
        <hr>
        <form action="{{ route('landing.steering.update', $steering->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" name="name" value="{{ $steering->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Institution</label>
                <input type="text" class="form-control" name="institution" value="{{ $steering->institution }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Country</label>
                <input type="text" class="form-control" name="country" value="{{ $steering->country }}" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
