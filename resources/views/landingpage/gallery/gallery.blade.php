@extends('layouts.landing')
@section('title', 'Home')
@section('content')
    <section id="gallery" class="gallery section">
        <div class="navgallery d-flex mx-4">
            <div class="container section-title" data-aos="fade-up">
                <h2>Gallery</h2>
                <div><span>Check Our</span> <span class="description-title">Gallery</span></div>
            </div>

            <div class="filter-gallery mb-4">
                <label for="yearFilter" id="titleFilter" class="mb-2">Filter by Year:</label>
                <select id="yearFilterOptions" class="form-select" onchange="filterGallery()">
                    <option value="all">All</option>
                    @foreach ($years as $year)
                        <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>
                            {{ $year->year }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0" id="galleryContainer">
                @foreach ($gallery as $image)
                    <div class="gallery-item col-lg-3 col-md-4" data-year="{{ $image->year }}">
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
            let selectedYear = document.getElementById('yearFilterOptions').value;
            let galleryItems = document.querySelectorAll('.gallery-item');

            galleryItems.forEach(item => {
                if (selectedYear === 'all' || item.getAttribute('data-year') === selectedYear) {
                    item.style.visibility = 'visible';
                    item.style.position = 'relative';
                    item.style.opacity = '1';
                    item.style.height = 'auto';
                    item.style.margin = '10px 0';
                    item.style.transition = 'opacity 0.3s ease-in-out';
                } else {
                    item.style.visibility = 'hidden';
                    item.style.position = 'absolute';
                    item.style.opacity = '0';
                    item.style.height = '0';
                    item.style.margin = '0';
                }
            });
        }
    </script>

@endsection
