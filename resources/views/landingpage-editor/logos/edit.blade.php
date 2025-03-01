@extends('layouts.app')

@section('title', 'Edit Logo')

@section('content')
    <div class="container">
        <h2>Edit Logo</h2>
        <a href="{{ route('landing.logos.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <form action="{{ route('landing.logos.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label><br>
                <img src="{{ asset('storage/' . $logo->image) }}" width="150">
            </div>
            <div class="mb-3">
                <label class="form-label">Upload Gambar Baru (Opsional)</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="year" class="form-control" value="{{ $logo->year }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
