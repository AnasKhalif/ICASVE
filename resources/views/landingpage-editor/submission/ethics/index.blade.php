@extends('layouts.app')

@section('title', 'Ethics and Malpractice Statement')

@section('content')
    <div class="container card p-4">
        <h2 class="fs-5">Ethics and Malpractice Statement</h2>
        <hr class="border border-success mb-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between mb-3">
            <h4 class="fw-bold">List of Ethics Statements</h4>
            <a href="{{ route('landing.ethics-statements.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Ethics Statement
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Ethics Statement</th>
                        <th class="text-center">File PDF</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ethics as $ethic)
                        <tr>
                            <td class="fw-bold">{{ $ethic->year }}</td>
                            <td>{!! Str::limit(strip_tags($ethic->content), 50) !!}</td>
                            <td>
                                @if ($ethic->pdf_file)
                                    <a href="{{ asset('storage/' . $ethic->pdf_file) }}" class="btn btn-sm btn-outline-success"
                                        target="_blank">
                                        <i class="fas fa-file-pdf"></i> Download
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada file</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('landing.ethics-statements.edit', $ethic->id) }}"
                                    class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('landing.ethics-statements.destroy', $ethic->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection