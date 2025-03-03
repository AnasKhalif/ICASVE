@extends('layouts.app')

@section('title', 'Add New Theme')

@section('content')
<div class="container mt-4">
    <h2 class="text-center fw-bold">Add New Theme</h2>
    <hr class="border border-success mb-4">

    <form action="{{ route('landing.themes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Year</label>
            <input type="number" class="form-control" name="year" min="2000" max="{{ date('Y') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <textarea class="form-control" name="description" id="editor" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
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
