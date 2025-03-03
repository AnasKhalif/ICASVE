@extends('layouts.app')

@section('title', 'Edit Theme')

@section('content')
<div class="container mt-4">
    <h2 class="text-center fw-bold">Edit Theme</h2>
    <hr class="border border-primary mb-4">

    <form action="{{ route('landing.themes.update', $theme->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $theme->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Year</label>
            <input type="number" class="form-control" name="year" min="2000" max="{{ date('Y') }}" value="{{ $theme->year }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea class="form-control" name="description" id="editor" required>{{ $theme->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('landing.themes.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('editor');
</script>

@endsection
