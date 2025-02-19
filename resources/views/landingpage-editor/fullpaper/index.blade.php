@extends('layouts.app')
@section('title', 'Fullpaper Submission Guidelines')
@section('content')
<div class="container">
    <h2>Fullpaper Submission Guidelines</h2>
    <a href="{{ route('landing.fullpaper-guidelines.create') }}" class="btn btn-success">Tambah Guideline</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Guideline</th>
                <th>Template PDF</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guidelines as $guideline)
            <tr>
                <td>{{ $guideline->year }}</td>
                <td>{!! Str::limit($guideline->content, 100) !!}</td>
                <td>
                    @if ($guideline->pdf_file)
                        <a href="{{ asset('storage/' . $guideline->pdf_file) }}" target="_blank">Download</a>
                    @else
                        Tidak ada file
                    @endif
                </td>
                <td>
                    <a href="{{ route('landing.fullpaper-guidelines.edit', $guideline->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('landing.fullpaper-guidelines.destroy', $guideline->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus guideline ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
