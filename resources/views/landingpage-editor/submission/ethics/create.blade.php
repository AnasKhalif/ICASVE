@extends('layouts.app')

@section('title', 'Tambah Ethics and Malpractice Statement')

@section('content')
    <div class="container card p-4">
        <h2 class="fs-5">Tambah Ethics and Malpractice Statement</h2>
        <hr class="border border-secondary mb-4">

        <form action="{{ route('landing.ethics-statements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="year" class="form-label fw-bold">Tahun</label>
                <input type="number" name="year" class="form-control" value="{{ date('Y') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Ethics Statement</label>
                <textarea name="content" id="editor" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="pdf_file" class="form-label fw-bold">Upload Ethics Document (PDF)</label>
                <input type="file" name="pdf_file" class="form-control">
                <small class="form-text text-muted">
                    Format: PDF | Max Size: 2MB
                </small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Add</button>
                <a href="{{ route('landing.ethics-statements.index') }}" class="btn btn-danger">Back</a>
            </div>
        </form>
    </div>

    {{-- Tambahkan CKEditor --}}
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.config.versionCheck = false;
        CKEDITOR.replace('editor');
    </script>
@endsection