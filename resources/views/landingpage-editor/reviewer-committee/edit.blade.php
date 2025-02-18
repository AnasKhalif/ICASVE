@extends('layouts.app')
@section('title', 'Edit Reviewer Committee')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Edit Reviewer Committee</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="card p-4">
            <form action="{{ route('landing.reviewer-committee.update', $reviewerCommittee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $reviewerCommittee->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $reviewerCommittee->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="institution" class="form-label">Institution</label>
                    <input type="text" class="form-control @error('institution') is-invalid @enderror" id="institution"
                        name="institution" value="{{ old('institution', $reviewerCommittee->institution) }}" required>
                    @error('institution')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('landing.reviewer-committee.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
