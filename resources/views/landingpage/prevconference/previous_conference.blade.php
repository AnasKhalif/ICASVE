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
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded">
                <img src="{{ asset('images/icasve-2023.jpg') }}" class="card-img-top" alt="ICASVE 2023 Poster">
                <div class="card-body">
                    <h5 class="card-title fw-bold">ICASVE 2023</h5>
                    <p class="card-text text-muted">ICASVE 2023 focused on the role of applied sciences in vocational education.</p>
                    <a href="{{ asset('documents/abstract-book-2023.pdf') }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="bi bi-download"></i> Download Abstract Book
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded">
                <img src="{{ asset('images/icasve-2022.jpg') }}" class="card-img-top" alt="ICASVE 2022 Poster">
                <div class="card-body">
                    <h5 class="card-title fw-bold">ICASVE 2022</h5>
                    <p class="card-text text-muted">ICASVE 2022 explored the impact of technology in vocational education.</p>
                    <a href="{{ asset('documents/abstract-book-2022.pdf') }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="bi bi-download"></i> Download Abstract Book
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded">
                <img src="{{ asset('images/icasve-2021.jpg') }}" class="card-img-top" alt="ICASVE 2021 Poster">
                <div class="card-body">
                    <h5 class="card-title fw-bold">ICASVE 2021</h5>
                    <p class="card-text text-muted">ICASVE 2021 focused on interdisciplinary collaboration in vocational studies.</p>
                    <a href="{{ asset('documents/abstract-book-2021.pdf') }}" class="btn btn-primary btn-sm" target="_blank">
                        <i class="bi bi-download"></i> Download Abstract Book
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection