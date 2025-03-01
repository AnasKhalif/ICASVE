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
            <form action="{{ route('landing.reviewer.update', $reviewerCommittee->id) }}" method="POST">
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
                    <label for="institution" class="form-label">Institution</label>
                    <input type="text" class="form-control @error('institution') is-invalid @enderror" id="institution"
                        name="institution" value="{{ old('institution', $reviewerCommittee->institution) }}" required>
                    @error('institution')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country"
                        name="country" value="{{ old('country', $reviewerCommittee->country) }}" required>
                    @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="year" class="form-label">Year</label>
                    <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
<<<<<<<< HEAD:resources/views/landingpage-editor/reviewer/edit.blade.php
                        name="year" value="{{ old('year', $reviewerCommittee->year) }}" required min="2000"
                        max="2100">
========
                        name="year" value="{{ old('year', $reviewerCommittee->year) }}" required min="2000" max="2100">
>>>>>>>> 3fa261e7c757d3a4eae2c581b5c1e0c0612a4ed1:resources/views/landingpage-editor/committee/reviewer/edit.blade.php
                    @error('year')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('landing.reviewer.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
