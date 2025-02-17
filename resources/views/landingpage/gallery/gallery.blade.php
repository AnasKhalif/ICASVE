@extends('layouts.landing')
@section('title', 'Home')
@section('content')
    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Gallery</h2>
            <div><span>Check Our</span> <span class="description-title">Gallery</span></div>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0">
                @foreach($gallery as $image)
                <div class="col-lg-3 col-md-4">
                    <div class="gallery-item">
                        <a href="{{ asset('storage/' . $image->image_path) }}" class="glightbox"
                            data-gallery="images-gallery">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="" class="img-fluid" />
                        </a>
                    </div>
                </div>
                @endforeach
                <!-- End Gallery Item -->
            </div>
        </div>
    </section>
    <!-- /Gallery Section -->
@endsection
