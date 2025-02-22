@extends('layouts.app')
@section('title', 'Edit Fullpaper Guideline')

@section('content')
    <div class="container">
        <h2>Edit Fullpaper Guideline</h2>
        <form action="{{ route('landing.fullpaper-guidelines.update', $fullpaperGuideline->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="year" class="form-label">Tahun</label>
                <input type="number" name="year" class="form-control" value="{{ $fullpaperGuideline->year }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Guideline</label>
                <textarea name="content" id="editor" class="form-control">{{ $fullpaperGuideline->content }}</textarea>
            </div>

            <div class="mb-3">
                <label for="pdf_file" class="form-label">Upload PDF (Opsional)</label>
                <input type="file" name="pdf_file" class="form-control">
            </div>

            @if ($fullpaperGuideline->pdf_file)
                <div class="mb-3">
                    <label>File PDF Saat Ini:</label><br>
                    <a href="{{ asset('storage/' . $fullpaperGuideline->pdf_file) }}" target="_blank">Download</a>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    {{-- Tambahkan CKEditor --}}
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
