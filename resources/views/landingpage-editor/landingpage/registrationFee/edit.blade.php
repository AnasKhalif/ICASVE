@extends('layouts.app')
@section('title', 'Edit Registration Fee')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Edit Registration Fee</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.registrationFee.update', $registrationFee->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="role_type">Role</label>
                        <select name="role_type" id="role_type" class="form-control" required>
                            <option value="" disabled>-- Select Role --</option>
                            <option value="presenter" {{ old('role_type', $registrationFee->role_type) == 'presenter' ? 'selected' : '' }}>Presenter</option>
                            <option value="non_presenter" {{ old('role_type', $registrationFee->role_type) == 'non_presenter' ? 'selected' : '' }}>Non-Presenter</option>
                            <option value="additional_fee" {{ old('role_type', $registrationFee->role_type) == 'additional_fee' ? 'selected' : '' }}>Additional Fee</option>
                        </select>
                        @error('role_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" value="{{ old('category_name', $registrationFee->category_name) }}" required>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="domestic_participants">Domestic Participants (optional)</label>
                        <input type="text" class="form-control" name="domestic_participants" id="domestic_participants" value="{{ old('domestic_participants', $registrationFee->domestic_participants) }}">
                        @error('domestic_participants')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="international_participants">International Participants (optional)</label>
                        <input type="text" class="form-control" name="international_participants" id="international_participants" value="{{ old('international_participants', $registrationFee->international_participants) }}">
                        @error('international_participants')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="period_of_payment">Period of Payment (optional)</label>
                        <input type="date" class="form-control" name="period_of_payment" id="period_of_payment" value="{{ old('period_of_payment', $registrationFee->period_of_payment) }}">
                        @error('period_of_payment')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('landing.registrationFee.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
