@extends('layouts.app')
@section('title', 'Edit Conference Title')
@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold">Edit Conference Title</h2>
        <hr>
        <form action="{{ route('landing.conference.update', $conference->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $conference->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Theme</label>
                <input type="text" class="form-control" name="theme" value="{{ $conference->theme }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">University</label>
                <input type="text" class="form-control" name="university" value="{{ $conference->university }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Hosted</label>
                <input type="text" class="form-control" name="hosted" value="{{ $conference->hosted }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Date and City</label>
                <input type="text" class="form-control" name="date" value="{{ $conference->date }}" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
