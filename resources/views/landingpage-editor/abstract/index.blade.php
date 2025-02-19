@extends('layouts.app')
@section('title', 'Abstract Guidelines')
@section('content')
<div class="container">
    <h2>Abstract Guidelines</h2>
    <a href="{{ route('landing.abstract-guidelines.create') }}" class="btn btn-primary">Tambah Guideline</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Guideline</th>
                <th>File PDF</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guidelines as $guideline)
            <tr>
                <td>{{ $guideline->year }}</td>
                <td>{!! Str::limit(strip_tags($guideline->content), 50) !!}</td>
                <td>
                    @if($guideline->pdf_file)
                        <a href="{{ asset('storage/' . $guideline->pdf_file) }}" target="_blank">Download</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
                <td>
                    <a href="{{ route('landing.abstract-guidelines.edit', $guideline->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('landing.abstract-guidelines.destroy', $guideline->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
