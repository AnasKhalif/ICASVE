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
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <input type="number" name="year" class="form-control" required min="2000"
                            max="{{ date('Y') }}">
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
