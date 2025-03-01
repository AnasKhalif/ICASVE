@extends('layouts.app')

@section('title', 'Edit Organizing Committee')

@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">EDIT ORGANIZING COMMITTEE</h2>
        <hr class="border border-success">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.organizing.update', $committee->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $committee->name) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="Chairperson"
                                {{ old('category', $committee->category) == 'Chairperson' ? 'selected' : '' }}>Chairperson
                            </option>
                            <option value="Vice Chairperson"
                                {{ old('category', $committee->category) == 'Vice Chairperson' ? 'selected' : '' }}>Vice
                                Chairperson</option>
                            <option value="Secretary"
                                {{ old('category', $committee->category) == 'Secretary' ? 'selected' : '' }}>Secretary
                            </option>
                            <option value="Treasurer"
                                {{ old('category', $committee->category) == 'Treasurer' ? 'selected' : '' }}>Treasurer
                            </option>
                            <option value="Member"
                                {{ old('category', $committee->category) == 'Member' ? 'selected' : '' }}>Member</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Year</label>
                        <input type="number" name="year" class="form-control"
                            value="{{ old('year', $committee->year) }}" min="2000" max="{{ date('Y') }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('landing.organizing.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
