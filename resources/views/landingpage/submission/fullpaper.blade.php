@extends('layouts.landing')

@section('title', 'Fullpaper')

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
                        <li class="breadcrumb-item active" aria-current="page">Fullpaper Submissions Guidelines</li>
                    </ol>
                </nav>

                <!-- Judul Halaman -->
                <h2 class="fw-bold mb-3">Submissions</h2>

                <!-- Alert: Not Accepting Submissions -->
                <div class="alert alert-secondary">
                    This journal is not accepting submissions at this time.
                </div>

                <!-- Submission Preparation Checklist -->
                <h4 class="fw-bold mt-4">Submission Preparation Checklist</h4>
                <p>As part of the submission process, authors are required to check off their submission’s compliance with
                    all of the following items, and submissions may be returned to authors that do not adhere to these
                    guidelines.</p>

                <div class="card p-3">
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle text-success me-2"></i> The submission has not been previously
                            published, nor is it before another journal for consideration (or an explanation has been
                            provided in Comments to the Editor).</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> The submission file is in OpenOffice,
                            Microsoft Word, or RTF document file format.</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> Where available, URLs for the references
                            have been provided.</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> The text is single-spaced; uses a 12-point
                            font; employs italics, rather than underlining (except with URL addresses); and all
                            illustrations, figures, and tables are placed within the text at the appropriate points, rather
                            than at the end.</li>
                        <li><i class="bi bi-check-circle text-success me-2"></i> The text adheres to the stylistic and
                            bibliographic requirements outlined in the Author Guidelines.</li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-3 my-3">
                <div class="d-flex flex-column gap-2">
                    <a href="#" class="btn text-white"
                        style="background: linear-gradient(to right, navy, orange);">Download Paper Template
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
