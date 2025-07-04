@extends('layouts.landing')

@section('title', 'Ethics and Malpractice Statement')

@section('content')
    <!-- Main Content -->
    <div class="container mt-4">
        <div class="row">
            <!-- Konten Utama -->
            <div class="col-lg-9">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ethics and Malpractice Statement</li>
                    </ol>
                </nav>

                <!-- Judul Halaman -->
                <h2 class="fw-bold mb-3">Ethics and Malpractice Statement</h2>


                @if (!$ethics)
                    <!-- Jika tidak ada ethics statement -->
                    <div class="alert alert-warning">
                        No ethics statement available for year {{ $selectedYear }}.
                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            {!! $ethics->content !!}
                        </div>
                    </div>

                    <!-- Tombol Download PDF -->
                    @if ($ethics->pdf_file)
                        <div class="text-start mt-3">
                            <a href="{{ asset('storage/' . $ethics->pdf_file) }}" class="btn text-white"
                                style="background: linear-gradient(to right, navy, orange);" target="_blank">
                                Download Ethics Document
                            </a>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <script>
        function filterByYear() {
            const year = document.getElementById('year').value;
            window.location.href = `{{ route('submission.ethics') }}?year=${year}`;
        }
    </script>
@endsection