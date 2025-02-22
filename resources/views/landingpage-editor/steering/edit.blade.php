@extends('layouts.app')

@section('title', 'Edit Steering Committee')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">EDIT STEERING COMMITTEE</h2>
        <hr class="border border-success">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.steering.update', $steering->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $steering->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Institution</label>
                        <input type="text" name="institution" class="form-control" value="{{ old('institution', $steering->institution) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Country</label>
                        <input type="text" name="country" class="form-control" value="{{ old('country', $steering->country) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Year</label>
                        <input type="number" name="year" class="form-control" min="2000" max="{{ date('Y') }}" value="{{ old('year', $steering->year) }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('landing.steering.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
