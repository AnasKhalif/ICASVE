@extends('layouts.landing')

@section('title', 'Conference Program')

@section('content')

    <div class="container my-5">
        <!-- Header -->
        @foreach ($conferences as $conference)
        <div class="text-center">
            <h1 class="fw-bold">Conference Program</h1>
            <p class="fs-5 text-muted">{{ $conference->title }}</p>
            <p class="fw-bold">({{ $conference->theme }})</p>
            <p class="text-muted">{{ $conference->university }}</p>
            <p class="text-muted">{{ $conference->hosted }}</p>
            <p class="fw-bold">{{ $conference->date }}</p>
        </div>
        @endforeach

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
