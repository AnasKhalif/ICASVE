@extends('layouts.app')
@section('title', 'Add Steering Committee')
@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold">Add Steering Committee</h2>
        <hr>
        <form action="{{ route('landing.conference.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Theme</label>
                <input type="text" class="form-control" name="theme" required>
            </div>
            <div class="mb-3">
                <label class="form-label">University</label>
                <input type="text" class="form-control" name="university" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hosted</label>
                <input type="text" class="form-control" name="hosted" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date and City</label>
                <input type="text" class="form-control" name="date" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
