@extends('layouts.app')

@section('title', 'Tambah Logo')

@section('content')
    <div class="container">
        <h2>Tambah Logo</h2>
        <a href="{{ route('landing.logos.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <form action="{{ route('landing.logos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="year" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
