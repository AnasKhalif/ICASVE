@extends('layouts.app')
@section('title', 'Add Poster')
@section('content')
    <div class="container">
        <h2>Tambah Poster</h2> <a href="{{ route('landing.poster.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('landing.poster.store') }}" method="POST" enctype="multipart/form-data"> @csrf <div
                class="mb-3"> <label for="image" class="form-label">Upload Poster</label> <input type="file"
                    name="image" id="image" class="form-control" required> </div>
            <div class="mb-3"> <label for="year" class="form-label">Year</label> <input type="number" name="year"
                    id="year" class="form-control" required min="2000" max="{{ date('Y') }}"> </div>
            <div class="mb-3"> <label for="link" class="form-label">Registration Link (Optional)</label> <input
                    type="url" name="link" id="link" class="form-control" placeholder="https://example.com">
            </div> <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
