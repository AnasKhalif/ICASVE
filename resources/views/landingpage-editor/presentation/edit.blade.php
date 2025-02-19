@extends('layouts.app')
@section("title", "Edit Presentation Guideline")
@section('content')
<div class="container">
    <h2>Edit Presentation Guideline</h2>
    <form action="{{ route('presentation-guidelines.update', $presentationGuideline->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="year" class="form-control" value="{{ $presentationGuideline->year }}" required>
        </div>

        <div class="mb-3">
            <label>Guideline</label>
            <textarea id="editor" name="content" class="form-control">{{ $presentationGuideline->content }}</textarea>
        </div>

        <div class="mb-3">
            <label>Upload PDF</label>
            <input type="file" name="pdf_file" class="form-control">
            @if($presentationGuideline->pdf_file)
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
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('editor', { height: 300 });
    });
</script>
@endsection
