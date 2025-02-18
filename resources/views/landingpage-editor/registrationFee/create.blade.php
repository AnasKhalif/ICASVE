@extends('layouts.app')
@section('title', 'New Registration Fee')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Registration Fee</h4>
                <form action="{{ route('landing.registrationFee.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="role_type">Role</label>
                        <select name="role_type" id="role_type" class="form-control" required>
                            <option value="" disabled selected>-- Select Role --</option>
                            <option value="presenter">Presenter</option>
                            <option value="non_presenter">Non-Presenter</option>
                            <option value="additional_fee">Additional Fee</option>
                        </select>
                        @error('role_type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" name="category_name" id="category_name" required>
                        @error('category_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="domestic_participants">Domestic Participants</label>
                        <input type="text" class="form-control" name="domestic_participants" id="domestic_participants">
                        @error('domestic_participants')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="international_participants	">International Participants</label>
                        <input type="text" class="form-control" name="international_participants"
                            id="international_participants">
                        @error('international_participants')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="period_of_payment">Period of Payment</label>
                        <input type="date" class="form-control" name="period_of_payment" id="period_of_payment">
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
