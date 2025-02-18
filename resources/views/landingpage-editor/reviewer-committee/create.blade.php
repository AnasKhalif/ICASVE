@extends('layouts.app')
@section('title', 'Add Reviewer Committee')
@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold">Add Reviewer Committee</h2>
        <hr>
        <form action="{{ route('landing.reviewer-committee.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="institution" class="form-label">Institution</label>
                <input type="text" class="form-control" id="institution" name="institution" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
