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
            margin-bottom: 10px;
        }

        .price-tag {
            background: linear-gradient(45deg, #28a745, #20c997);
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
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
            <h2 class="section-title text-dark fw-bold mb-5">Informasi Penginapan Terdekat Universitas Brawijaya</h2>

            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card hotel-card border-0">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1470&q=80"
                            class="card-img-top hotel-image" alt="Hotel Exterior">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h3 class="card-title fw-bold text-dark mb-2">Grand Paradise Hotel & Resort</h3>
                                    <div class="rating-stars mb-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <span class="text-muted ms-2">(4.8/5) - 324 Reviews</span>
                                    </div>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        Jl. Raya Seminyak No. 123, Bali, Indonesia
                                    </p>
                                </div>
                            </div>

                            <p class="card-text text-muted mb-4">
                                Hotel mewah dengan pemandangan pantai yang menakjubkan. Menawarkan fasilitas terlengkap
                                dengan pelayanan berkelas dunia. Lokasi strategis dekat dengan pusat perbelanjaan dan
                                tempat wisata populer di Bali.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="card border-0 hotel-card mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">
                                <i class="fas fa-map-marked-alt me-2 text-primary"></i>Lokasi Hotel
                            </h5>
                            <div class="map-container">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.2087899745556!2d115.15895931478164!3d-8.673220293824847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd246c2b7a7ee45%3A0x369a95d1da6ff5c5!2sSeminyak%2C%20Kuta%2C%20Badung%20Regency%2C%20Bali!5e0!3m2!1sen!2sid!4v1640123456789!5m2!1sen!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                                </iframe>
                            </div>
                            <div class="mt-3">
                                <small class="text-muted">
                                    <i class="fas fa-info-circle me-1"></i>
                                    5 menit ke pantai, 15 menit ke bandara
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 hotel-card">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">
                                <i class="fas fa-phone me-2 text-primary"></i>Kontak Hotel
                            </h5>
                            <div class="d-flex flex-column gap-2">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-phone text-muted me-3"></i>
                                    <span>+62 361 123 4567</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-muted me-3"></i>
                                    <span>info@grandparadise.com</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-globe text-muted me-3"></i>
                                    <a href="#" class="text-decoration-none">www.grandparadise.com</a>
                                </div>
                            </div>

                            <hr class="my-3">

                            <h6 class="fw-bold mb-2">Check-in / Check-out</h6>
                            <div class="row g-2 text-sm">
                                <div class="col-6">
                                    <small class="text-muted">Check-in:</small><br>
                                    <strong>15:00</strong>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted">Check-out:</small><br>
                                    <strong>12:00</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

        </div>
    </section>
@endsection
