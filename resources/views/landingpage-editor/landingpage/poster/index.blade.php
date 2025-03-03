@extends('layouts.app')
@section('title', 'Poster')
@section('content')
    <div class="container">
        <h2 class="mb-4">Daftar Poster</h2>
        <a href="{{ route('landing.poster.create') }}" class="btn btn-primary mb-3">Tambah Poster</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posters as $index => $poster)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $poster->image) }}" alt="Poster" width="100">
                            </td>
                            <td>{{ $poster->year }}</td>
                            <td>
                                <a href="{{ route('landing.poster.edit', $poster->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('landing.poster.destroy', $poster->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus poster ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
