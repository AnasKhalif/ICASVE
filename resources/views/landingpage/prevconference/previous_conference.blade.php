@extends('layouts.landing')

@section('title', 'Previous Conferences')

@section('content')

<div class="container my-5">
    <!-- Header -->
    <div class="text-center">
        <h1 class="fw-bold">Previous Conferences</h1>
        <p class="text-muted">A look back at our past ICASVE conferences.</p>
    </div>

    <!-- Dropdown to select year -->
    <div class="text-center mb-4">
        <form method="GET" action="{{ route('previous.conference') }}">
            <select name="year" class="form-select d-inline-block w-auto">
                @foreach ($posters as $poster)
                    <option value="{{ $poster->year }}" {{ $selectedYear == $poster->year ? 'selected' : '' }}>
                        ICASVE {{ $poster->year }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary btn-sm ml-2">Filter</button>
        </form>
    </div>

    <!-- List of Previous Conferences -->
    <div class="row mt-4">
        <!-- Poster Loop -->
        @foreach ($posters as $poster)
            @if ($poster->year == $selectedYear)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <img src="{{ asset('storage/' . $poster->image) }}" class="card-img-top" alt="ICASVE {{ $poster->year }} Poster">
                    <div class="card-body">
                        @foreach ($conferenceSetting as $title)
                            <h5 class="card-title fw-bold">{{ $title->conference_abbreviation }}</h5>
                            <p class="card-text text-muted">{{ $title->conference_title }}</p>
                            <form method="GET" action="{{ route('downloadAllPdf') }}">
                                <input type="hidden" name="year" value="{{ $selectedYear }}">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="bi bi-download"></i> Download Abstract Book for ICASVE {{ $selectedYear }}
                                </button>
                            </form>
                            
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>

@endsection
