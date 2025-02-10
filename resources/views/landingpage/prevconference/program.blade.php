@extends('layouts.landing')
@section('title', 'Conference Program')
@section('content')

<div class="container mt-5">
    <!-- Header -->
    <h2 class="text-center fw-bold bg-primary text-white p-3 rounded">CONFERENCE PROGRAM</h2>

    <!-- Tabs -->
    <div class="text-center my-3">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link active fw-bold" data-bs-toggle="pill" href="#day1">Day 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link fw-bold" data-bs-toggle="pill" href="#day2">Day 2</a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <!-- Day 1 Content -->
        <div class="tab-pane fade show active" id="day1">
            <div class="program-schedule">
                <p class="fw-bold text-dark mt-3"> <strong>7:00 - </strong> <span class="text-primary">Join the virtual conference</span> <span class="text-muted">(Main Room)</span></p>

                <div class="p-2 bg-success bg-opacity-10 rounded fw-bold">Opening Ceremony</div>

                <p><strong>08:00 - </strong> Listening to the Indonesian National Anthem <span class="text-muted">(Main Room)</span></p>
                <p><strong>08:05 - </strong> Welcome Speech</p>
                <p><strong>08:10 - </strong> Welcoming Remarks</p>
                <p><strong>08:35 - </strong> Photo Session</p>

                <div class="p-2 bg-info bg-opacity-10 rounded fw-bold">Plenary Session I</div>

                <p><strong>08:40 - </strong> Prof. Tomohiro Kuroda <span class="text-muted">(Kyoto University, Japan)</span></p>

                <div class="p-2 bg-warning bg-opacity-10 rounded fw-bold">Morning Break</div>

                <p><strong>09:30 - </strong> Break Time <span class="text-muted">(Main Room)</span></p>
            </div>
        </div>

        <!-- Day 2 Content -->
        <div class="tab-pane fade" id="day2">
            <p class="text-muted">Conference schedule for Day 2 will be available soon.</p>
        </div>
    </div>
</div>

@endsection