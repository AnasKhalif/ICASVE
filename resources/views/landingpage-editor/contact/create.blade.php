@extends('layouts.app')

@section('title', 'Add Contact')

@section('content')
<div class="container mt-4">
    <h2 class="text-center fw-bold">ADD CONTACT</h2>
    <hr class="border border-success">

    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('landing.contact.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Website</label>
                    <input type="url" name="website" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('landing.contact.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
