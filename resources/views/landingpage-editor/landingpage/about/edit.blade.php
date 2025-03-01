@extends('layouts.app')
@section('title', 'Edit About')
@section('content')
    <div class="container">
        <h2>Edit About</h2>

        <form action="{{ route('landing.abouts.update', $about->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="{{ $about->title }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required>{{ $about->content }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Current Image</label>
                @if ($about->image)
                    <img src="{{ asset('storage/' . $about->image) }}" class="img-fluid mb-3">
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">New Image (optional)</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
