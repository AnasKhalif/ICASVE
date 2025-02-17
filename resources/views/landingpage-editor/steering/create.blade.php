@extends('layouts.app')
@section('title', 'Add Steering Committee')
@section('content')

<div class="container mt-4">
    <h2 class="fw-bold">Add Steering Committee</h2>
    <hr>

    <form action="{{ route('landing.steering.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Institution</label>
            <input type="text" class="form-control" name="institution" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection
