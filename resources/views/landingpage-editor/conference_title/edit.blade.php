<!-- resources/views/conference_titles/edit.blade.php -->
@extends('layouts.app')
@section('title', 'Edit Conference Title')
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Conference Title</h2>
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('landing.conference-title.update', $conferenceTitle->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $conferenceTitle->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" required>{{ $conferenceTitle->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="number" name="year" class="form-control" value="{{ $conferenceTitle->year }}" required min="2000" max="{{ date('Y') }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
