@extends('layouts.app')

@section('title', 'Edit Presentation Guideline')

@section('content')
    <div class="container">
        <h2>Edit Presentation Guideline</h2>
        <form action="{{ route('landing.presentation-guidelines.update', $presentationGuideline->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Tahun</label>
                <input type="number" name="year" class="form-control" value="{{ $presentationGuideline->year }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Guideline</label>
                <textarea name="content" id="editor" class="form-control">{{ $presentationGuideline->content }}</textarea>
            </div>

            <div class="mb-3">
                <label>Upload PDF</label>
                <input type="file" name="pdf_file" class="form-control">
                <small class="form-text text-muted">
                    Format: PDF| Max Size: 2MB 
                </small>
                @if ($presentationGuideline->pdf_file)
                    <p class="mt-2">File Saat Ini:
                        <a href="{{ asset('storage/' . $presentationGuideline->pdf_file) }}" target="_blank">
                            Download PDF
                        </a>
                    </p>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('editor');
</script>
@endsection


