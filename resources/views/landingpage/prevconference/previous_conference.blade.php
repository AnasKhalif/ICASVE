@extends('layouts.landing')

@section('title', 'Previous Conferences')

@section('content')

<div class="container my-5">
    <!-- Header -->
    <div class="text-center">
        <h1 class="fw-bold">Previous Conferences</h1>
        <p class="text-muted">A look back at our past ICASVE conferences.</p>
    </div>

    <!-- List of Previous Conferences -->
    <div class="row mt-4">
        <!-- Example Conference Item -->
        @foreach ($posters as $poster)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded">
                <img src="{{ asset('storage/' . $poster->image) }}" class="card-img-top" alt="ICASVE 2023 Poster">
                <div class="card-body">
                     @foreach ($conferenceSetting as $title)
                         <h5 class="card-title fw-bold">{{ $title->conference_abbreviation }}</h5>
                         <p class="card-text text-muted">{{ $title->conference_title }}</p>
                    <a href="{{ route('downloadAllPdf')}}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="bi bi-download"></i> Download Abstract Book
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection