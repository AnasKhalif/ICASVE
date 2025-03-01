@extends('layouts.app')
@section('title', 'Edit Registration Fee')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Registration Fee</h4>
                <form action="{{ route('landing.registrationFee.update', $registrationFee->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="role_type">Role</label>
                        <select name="role_type" id="role_type" class="form-control @error('role_type') is-invalid @enderror"
                            required>
                            <option value="" disabled>-- Select Role --</option>
                            <option value="presenter"
                                {{ old('role_type', $registrationFee->role_type) == 'presenter' ? 'selected' : '' }}>
                                Presenter</option>
                            <option value="non_presenter"
                                {{ old('role_type', $registrationFee->role_type) == 'non_presenter' ? 'selected' : '' }}>
                                Non-Presenter</option>
                            <option value="additional_fee"
                                {{ old('role_type', $registrationFee->role_type) == 'additional_fee' ? 'selected' : '' }}>
                                Additional Fee</option>
                        </select>
                        @error('role_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                            name="category_name" id="category_name"
                            value="{{ old('category_name', $registrationFee->category_name) }}" required>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="domestic_participants">Domestic Participants</label>
                        <input type="text" class="form-control @error('domestic_participants') is-invalid @enderror"
                            name="domestic_participants" id="domestic_participants"
                            value="{{ old('domestic_participants', $registrationFee->domestic_participants) }}" required>
                        @error('domestic_participants')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="international_participants">International Participants</label>
                        <input type="text" class="form-control @error('international_participants') is-invalid @enderror"
                            name="international_participants" id="international_participants"
                            value="{{ old('international_participants', $registrationFee->international_participants) }}"
                            required>
                        @error('international_participants')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="period_of_payment">Period of Payment</label>
                        <input type="date" class="form-control @error('period_of_payment') is-invalid @enderror"
                            name="period_of_payment" id="period_of_payment"
                            value="{{ old('period_of_payment', $registrationFee->period_of_payment) }}" required>
                        @error('period_of_payment')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection