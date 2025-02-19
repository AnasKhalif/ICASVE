@extends('layouts.app')
@section('title', 'Presentation Guidelines')
@section('content')
<div class="container">
    <h2>Presentation Guidelines</h2>
    <a href="{{ route('landing.presentation-guidelines.create') }}" class="btn btn-primary mb-3">Tambah Guideline</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Terakhir Diperbarui</th>
                <th>PDF</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guidelines as $guideline)
            <tr>
                <td>{{ $guideline->year }}</td>
                <td>{{ $guideline->updated_at->format('d M Y') }}</td>
                <td>
                    @if($guideline->pdf_file)
                        <a href="{{ asset('storage/' . $guideline->pdf_file) }}" target="_blank">Download</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
                <td>
                    <a href="{{ route('landing.presentation-guidelines.edit', $guideline->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('landing.presentation-guidelines.destroy', $guideline->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
