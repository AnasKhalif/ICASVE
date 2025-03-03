@extends('layouts.app')
@section('title', 'Edit Conference Title')
@section('content')
    <div class="container">
        <h2 class="mb-4">Edit Conference Title</h2>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('landing.conference-title.update', $conferenceTitle->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $conferenceTitle->title }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" required>{{ $conferenceTitle->description }}</textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" value="{{ $conferenceTitle->year }}" required min="2000" max="{{ date('Y') }}">
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
