@extends('layouts.app')

@section('title', 'Add Reviewer Committee')

@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold">Add Reviewer Committee</h2>
        <hr>
        <form action="{{ route('landing.reviewer.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="institution" class="form-label">Institution</label>
                <input type="text" class="form-control" id="institution" name="institution" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" required>
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="number" id="year" name="year" class="form-control" min="2000" max="{{ date('Y') }}" value="{{ date('Y') }}" required>
            </div>
            
            <div class="d-flex gap-2">
                <a href="{{ route('landing.reviewer.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
@endsection
