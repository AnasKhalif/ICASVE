@extends('layouts.landing')

@section('title', 'Hotel Information')

@push('styles')
    <style>
        .hotel-card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
        }

        .hotel-image {
            height: 300px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .rating-stars {
            color: #ffc107;
        }

        .amenity-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #007bff, #0056b3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 15px;
            font-size: 16px;
            flex-shrink: 0;
        }

        .map-container {
            height: 400px;
            border-radius: 15px;
            overflow: hidden;
        }

        .section-title {
            position: relative;
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(45deg, #007bff, #0056b3);
            border-radius: 2px;
        }
    </style>
@endpush

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="section-title text-dark fw-bold mb-5">Nearby Accommodation Information - Universitas Brawijaya</h2>

            <div class="row g-4">
                @foreach ($hotels as $hotel)
                    <div class="col-lg-8">
                        <div class="card hotel-card border-0">
                            <img src="{{ asset('storage/' . $hotel->image) }}" class="card-img-top hotel-image" alt="{{ $hotel->name }}">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h3 class="card-title fw-bold text-dark mb-2">{{ $hotel->name }}</h3>
                                        <div class="rating-stars mb-2">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= floor($hotel->rating))
                                                    <i class="bi bi-star-fill"></i>
                                                @elseif ($i <= ceil($hotel->rating))
                                                    <i class="bi bi-star-half"></i>
                                                @else
                                                    <i class="bi bi-star"></i>
                                                @endif
                                            @endfor
                                            <span class="text-muted ms-2">({{ $hotel->rating }}/5)</span>
                                        </div>
                                        <p class="text-muted mb-0">
                                            <i class="fas fa-map-marker-alt me-2"></i>
                                            {{ $hotel->address }}
                                        </p>
                                    </div>
                                </div>

                                <p class="card-text text-muted mb-2">
                                    {{ $hotel->description }}
                                </p>

                                <div class="mt-2">
                                    <h5 class="fw-bold mb-3">
                                        <i class="me-2 text-primary"></i>Contact Information
                                    </h5>

                                    <div class="d-flex align-items-start mb-3">
                                        <div class="amenity-icon"><i class="bi-telephone-fill"></i></div>
                                        <div>
                                            <strong>Phone:</strong><br>
                                            <span class="text-muted">{{ $hotel->phone }}</span>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mb-3">
                                        <div class="amenity-icon"><i class="bi-envelope-fill"></i></div>
                                        <div>
                                            <strong>Email:</strong><br>
                                            <a href="mailto:{{ $hotel->email }}" class="text-muted text-decoration-none">
                                                {{ $hotel->email }}
                                            </a>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-start mb-3">
                                        <div class="amenity-icon"><i class="bi-globe"></i></div>
                                        <div>
                                            <strong>Website:</strong><br>
                                            <a href="{{ $hotel->website }}" target="_blank" class="text-muted text-decoration-none">
                                                {{ $hotel->website }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar - Map -->
                    <div class="col-lg-4">
                        <div class="card border-0 hotel-card mb-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3">
                                    <i class="fas fa-map-marked-alt me-2 text-primary"></i>Hotel Location
                                </h5>
                                <div class="map-container">
                                    <iframe
                                        src="{{ $hotel->map_url }}"
                                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                                    </iframe>
                                </div>
                                <div class="mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle me-1"></i>
                                        View location on Google Maps
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
