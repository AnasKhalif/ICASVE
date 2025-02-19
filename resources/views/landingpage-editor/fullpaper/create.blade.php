@extends('layouts.app')
@section('title', 'Tambah Fullpaper Guideline')
@section('content')
<div class="container">
    <h2>Tambah Fullpaper Guideline</h2>
    <form action="{{ route('landing.fullpaper-guidelines.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="year" class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Guideline</label>
            <textarea name="content" id="editor" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="pdf_file" class="form-label">Upload Template Paper (PDF)</label>
            <input type="file" name="pdf_file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

{{-- Tambahkan CKEditor --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
</script>
@endsection
