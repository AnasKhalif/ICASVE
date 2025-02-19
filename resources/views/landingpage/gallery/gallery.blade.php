@extends('layouts.landing')
@section('title', 'Home')
@section('content')
    <section id="gallery" class="gallery section">

        <div class="navgallery d-flex mx-4">
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <div><span>Check Our</span> <span class="description-title">Gallery</span></div>
            </div>

            <div class="mb-4 mx-4">
                <label for="yearFilter" class="mb-2">Filter by Year:</label>
                <select id="yearFilter" style="max-width: 200px" class="form-select" onchange="filterGallery()">
                    <option value="all">All</option>
                    @foreach ($years as $year)
                        <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>
                            {{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0">
                <div class="row g-0" id="galleryContainer">
                    @foreach ($gallery as $image)
                        <div class="col-lg-3 col-md-4 gallery-item" data-year="{{ $image->year }}">
                            <a href="{{ asset('storage/' . $image->image_path) }}" class="glightbox"
                                data-gallery="images-gallery">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="" class="img-fluid" />
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
    <script>
        function filterGallery() {
            let selectedYear = document.getElementById('yearFilter').value;
            let galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(item => {
                if (selectedYear === 'all' || item.getAttribute('data-year') === selectedYear) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        }
    </script>
@endsection
