@extends('layouts.app')
@section('title', 'Abstract Landing Page')
@section('content')
<div class="container">
    <h2>Abstract Landing Page</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('landing.abstractlanding.create') }}" class="btn btn-primary">Tambah Guideline</a>

    @if($abstractLanding)
        <div class="mt-3">
            <h4>Guideline:</h4>
            <div>{!! $abstractLanding->guideline !!}</div>

            @if($abstractLanding)
            <a href="{{ route('landing.abstractlanding.edit', $abstractLanding->id) }}" class="btn btn-warning">Edit</a>
        @endif
        
            <form action="{{ route('landing.abstractlanding.destroy', $abstractLanding->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus Guideline</button>
            </form>
        </div>
    @endif

    <h4 class="mt-4">Upload PDF Template</h4>
    <form action="{{ route('landing.abstractlanding.upload', $abstractLanding->id ?? 0) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="template" class="form-control">
        <button type="submit" class="btn btn-success mt-2">Upload Template</button>
    </form>

    @if($abstractLanding && $abstractLanding->pdf_template)
        <p>Template Terbaru: <a href="{{ asset('storage/templates/' . $abstractLanding->pdf_template) }}" target="_blank">Download</a></p>
    @endif
</div>
@endsection
