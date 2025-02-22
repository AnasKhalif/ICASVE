@extends('layouts.app')
@section('title', 'About Section')
@section('content')
    <div class="container">
        <h2 class="mb-4">About Section</h2>
        <a href="{{ route('landing.abouts.create') }}" class="btn btn-primary mb-3">Add About</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach ($abouts as $about)
                <div class="col-md-6">
                    <div class="card">
                        @if ($about->image)
                            <img src="{{ asset('storage/' . $about->image) }}" class="card-img-top" alt="{{ $about->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $about->title }}</h5>
                            <p class="card-text">{{ Str::limit($about->content, 150) }}</p>
                            <a href="{{ route('landing.abouts.edit', $about->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('landing.abouts.destroy', $about->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
