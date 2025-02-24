@extends('layouts.landing')

@section('title', "ICASVE Archives - $year")

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold mb-4">ICASVE Archives - {{ $year }}</h1>

    <div class="row mt-4">
        <!-- Sidebar Archives -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('archives.index') }}" class="list-group-item list-group-item-action">
                    ← Kembali ke Daftar Tahun
                </a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="p-4 border rounded bg-light">
                <h2 class="fw-bold text-dark">Abstracts - {{ $year }}</h2>

                @if($abstracts->isEmpty())
                    <p class="text-center text-muted">Belum ada abstrak untuk tahun {{ $year }}.</p>
                @else
                    <div class="list-group">
                        @foreach ($abstracts as $abstract)
                            <div class="list-group-item p-3 mb-3 shadow-sm rounded">
                                <h5 class="fw-bold">{{ $abstract->title }}</h5>
                                <p><strong>Topik:</strong> {{ $abstract->presentation_type }}</p>
                                <p><strong>Penulis:</strong> {{ $abstract->authors }}</p>
                                <a href="{{ asset('storage/abstracts/' . $abstract->id . '.pdf') }}" class="btn btn-primary btn-sm text-white" download>Download Abstract</a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
