@extends('layouts.landing')

@section('title', 'Conference Program')

@section('content')

    <div class="container my-5">
        <!-- Header -->
        <div class="text-center">
            <h1 class="fw-bold">Conference Program</h1>
            <p class="fs-5 text-muted">Rundown The 3rd ICASVE 2024</p>
            <p class="fw-bold">(International Conference on Applied Science for Vocational Education)</p>
            <p class="text-muted">Hybrid Conference | Faculty of Vocational Studies, Universitas Brawijaya</p>
            <p class="text-muted">Co-hosted by State Polytechnic of Batam & State University of Malang</p>
            <p class="fw-bold">October 23rd, 2024 - Batam</p>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"><i class="bi bi-clock"></i> Time</th>
                        <th scope="col"><i class="bi bi-journal-text"></i> Program</th>
                        <th scope="col"><i class="bi bi-person"></i> PIC</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($programs as $program)
                        <tr>
                            <td>{{ $program->start_time }} - {{ $program->end_time }}</td>
                            <td>{{ $program->program_name }}</td>
                            <td>{{ $program->pic }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
