@extends('layouts.app')
@section('title', 'Edit FAQ')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">EDIT FAQ</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.faq.update', $faq->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title', $faq->title) }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description">{{ old('description', $faq->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('landing.faq.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection