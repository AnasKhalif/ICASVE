
@extends('layouts.app')
@section('title', 'Edit Whatsapp')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Edit Whatsapp</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('landing.whatsapp.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nomor" class="form-label">Number</label>
                <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $whatsapp->nomor }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('landing.whatsapp.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection