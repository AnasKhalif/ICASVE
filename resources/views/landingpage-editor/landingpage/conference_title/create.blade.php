@extends('layouts.app')
@section('title', 'Add Conference Title')
@section('content')
    <div class="container">
        <h2 class="mb-4">Add Conference Title</h2>
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <form action="{{ route('landing.conference-title.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tema</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" required></textarea>
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="number" name="year" class="form-control @error('year') is-invalid @enderror" required min="2000" max="{{ date('Y') }}" value="{{ date('Y') }}">
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
