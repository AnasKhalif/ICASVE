@extends('layouts.app')

@section('title', 'Add Organizing Committee')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">ADD ORGANIZING COMMITTEE</h2>
        <hr class="border border-success">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.organizing.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="" selected disabled>Select Category</option>
                            <option value="Chairperson">Chairperson</option>
                            <option value="Vice Chairperson">Vice Chairperson</option>
                            <option value="Secretary">Secretary</option>
                            <option value="Treasurer">Treasurer</option>
                            <option value="Member">Member</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Year</label>
                        <input type="number" name="year" class="form-control" min="2000" max="{{ date('Y') }}" value="{{ date('Y') }}" required>

                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{ route('landing.organizing.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
