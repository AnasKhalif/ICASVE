@extends('layouts.app')

@section('title', 'Add Steering Committee')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">ADD STEERING COMMITTEE</h2>
        <hr class="border border-success">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.steering.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Institution</label>
                        <input type="text" name="institution" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Country</label>
                        <input type="text" name="country" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Year</label>
                        <input type="number" name="year" class="form-control" min="2000" max="{{ date('Y') }}" value="{{ date('Y') }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('landing.steering.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
