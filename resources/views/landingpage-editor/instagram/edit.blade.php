@extends('layouts.app')
@section('title', 'Edit Instagram')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Edit Instagram</h2>
        <hr class="border border-success">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('landing.instagram.update', $instagram->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ old('link', $instagram->link) }}" required placeholder="Contoh: https://www.instagram.com/username">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('landing.instagram.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
