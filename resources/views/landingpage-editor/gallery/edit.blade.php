@extends('layouts.app')
@section('title', 'Edit Gallery')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold text-uppercase">EDIT Gallery</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $gallery->image_path) }}" width="150">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Upload Gambar Baru (Opsional)</label>
                        <input type="file"  name="image_path" id="image_path" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="year">Year</label>
                        <input type="text" class="form-control @error('year') is-invalid @enderror" name="year"
                            id="year" value="{{ $gallery->year }}" required>
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
