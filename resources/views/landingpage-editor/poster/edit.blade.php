@extends('layouts.app')
@section('title', 'Edit Poster')
@section('content')
    <div class="container">
        <h2>Edit Poster</h2> <a href="{{ route('landing.poster.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <form action="{{ route('landing.poster.update', $poster->id) }}" method="POST" enctype="multipart/form-data"> @csrf
            @method('PUT') <div class="mb-3"> <label class="form-label">Gambar Saat Ini</label><br> <img
                    src="{{ asset('storage/' . $poster->image) }}" width="150"> </div>
            <div class="mb-3"> <label class="form-label">Upload Gambar Baru (Opsional)</label> <input type="file"
                    name="image" class="form-control"> </div>
            <div class="mb-3"> <label class="form-label">Tahun</label> <input type="number" name="year"
                    class="form-control" value="{{ $poster->year }}" required> </div>
            <div class="mb-3"> <label class="form-label">Link Pendaftaran (Opsional)</label> <input type="url"
                    name="link" class="form-control" value="{{ $poster->link }}" placeholder="https://example.com">
            </div> <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
