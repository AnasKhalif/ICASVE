@extends('layouts.landing')

@section('title', 'ICASVE Archives')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold mb-4">ICASVE Archives</h1>

    <div class="row">
        <!-- Sidebar Archives -->
        <div class="col-md-3">
            <div class="list-group" id="year-list">
                @foreach ($years as $year)
                    <a href="{{ route('archives.index', ['year' => $year]) }}" 
                       class="list-group-item list-group-item-action {{ $year == $selectedYear ? 'active' : '' }}">
                        ICASVE - {{ $year }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="p-4 border rounded bg-light">
                <h2 class="fw-bold text-dark">Abstracts - {{ $selectedYear }}</h2>

                <div id="abstract-list">
                    @if ($abstracts->isEmpty())
                        <p class="text-center text-muted">No abstracts available for {{ $selectedYear }}.</p>
                    @else
                        <div class="row">
                            @foreach ($abstracts as $abstract)
                                <div class="col-md-12 mb-3">
                                    <div class="card shadow-sm border-0 rounded">
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold text-primary">{{ $abstract->title }}</h5>
                                            <p class="card-text mb-1">
                                                <strong>Authors:</strong> {{ $abstract->authors }}
                                            </p>
                                            <p class="card-text mb-1">
                                                <strong>Affiliations:</strong> {{ $abstract->affiliations }}
                                            </p>
                                            <p class="card-text">
                                                <strong>Presentation Type:</strong> {{ ucfirst($abstract->presentation_type) }}
                                            </p>
                                            <p class="text-muted small">Corresponding Email: {{ $abstract->corresponding_email }}</p>

                                            <!-- Tombol Download -->
                                            @if ($abstract->file_path)
                                            <a href="{{ route('abstracts.download', $abstract->id) }}" class="btn btn-primary">
                                                Download Abstract
                                            </a>
                                            
                                            @else
                                                <span class="text-danger small">No abstract file available</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
