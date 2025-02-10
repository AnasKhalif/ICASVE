@extends('layouts.landing')
@section('title', 'Home')
@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold mb-4">ICASVE Archives</h1>

    <div class="row mt-4">
        <!-- Sidebar Archives -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active fw-bold bg-primary text-white">ICASVE-2024</a>
                <a href="#" class="list-group-item list-group-item-action">ICASVE-2023</a>
                <a href="#" class="list-group-item list-group-item-action">ICASVE-2022</a>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="p-4 border rounded bg-light">
                <h2 class="fw-bold text-dark">ICASVE-2024</h2>
                <div class="text-center mb-4">
                    <img src="https://via.placeholder.com/600x400/cccccc/ffffff?text=ICASVE+2024" class="img-fluid rounded" alt="Poster ICASVE-2024">
                </div>
                <p class="text-muted">Deskripsi singkat tentang ICASVE-2024. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>

                <!-- Abstract List -->
                <div class="abstract-list mt-4">
                    <h4 class="fw-bold text-dark">Abstracts</h4>
                    <div class="list-group">
                        <div class="list-group-item p-3 mb-2">
                            <h5 class="fw-bold">Judul Abstract 1</h5>
                            <p class="mb-1"><strong>Topik:</strong> Topik Abstract 1</p>
                            <p class="mb-1"><strong>Penulis:</strong> Penulis Abstract 1</p>
                            <a href="abstract1.pdf" class="btn btn-primary btn-sm text-white" download>Download Abstract</a>
                        </div>
                        <div class="list-group-item p-3 mb-2">
                            <h5 class="fw-bold">Judul Abstract 2</h5>
                            <p class="mb-1"><strong>Topik:</strong> Topik Abstract 2</p>
                            <p class="mb-1"><strong>Penulis:</strong> Penulis Abstract 2</p>
                            <a href="abstract2.pdf" class="btn btn-primary btn-sm text-white" download>Download Abstract</a>
                        </div>
                        <div class="list-group-item p-3">
                            <h5 class="fw-bold">Judul Abstract 3</h5>
                            <p class="mb-1"><strong>Topik:</strong> Topik Abstract 3</p>
                            <p class="mb-1"><strong>Penulis:</strong> Penulis Abstract 3</p>
                            <a href="abstract3.pdf" class="btn btn-primary btn-sm text-white" download>Download Abstract</a>
                        </div>
                    </div>
                </div>

                <!-- Download Abstract Book -->
                <div class="text-center mt-4">
                    <a href="abstract_book.pdf" class="btn btn-primary text-white fw-bold px-4 py-2" download>Download Abstract Book</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection