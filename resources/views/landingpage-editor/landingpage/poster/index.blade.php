@extends('layouts.app')
@section('title', 'Poster')
@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Poster</h2>
    <a href="{{ route('landing.poster.create') }}" class="btn btn-primary mb-3">Tambah Poster</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach ($posters as $poster)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset('storage/' . $poster->image) }}" class="card-img-top" alt="Poster">
                <div class="card-body">
                    <h5 class="card-title">Tahun: {{ $poster->year }}</h5>
                    <a href="{{ route('landing.poster.edit', $poster->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('landing.poster.destroy', $poster->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Hapus poster ini?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
