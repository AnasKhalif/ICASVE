@extends('layouts.app')
@section('title', 'Tambah Abstract Guideline')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Tambah Abstract Guideline</h2>
        <hr class="border border-success mb-4">

        <form action="{{ route('landing.abstract-guidelines.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="year" class="form-label fw-bold">Tahun</label>
                <input type="number" name="year" class="form-control" value="{{ date('Y') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Guideline</label>
                <textarea name="content" id="editor" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="pdf_file" class="form-label fw-bold">Upload Template Paper (PDF)</label>
                <input type="file" name="pdf_file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('landing.abstract-guidelines.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
