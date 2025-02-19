@extends('layouts.app')
@section('title', 'Edit Contact')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">EDIT CONTACT</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.contact.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" required>{{ $contact->address }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('landing.contact.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
