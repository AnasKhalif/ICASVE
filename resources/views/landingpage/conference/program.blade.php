@extends('layouts.landing')

@section('title', 'Conference Program')

@section('content')

    <div class="container my-5">
        <div class="container section-title" data-aos="fade-up">
            <h2>Conference Program</h2>
            <div><span>Check Our</span> <span class="description-title">Conference Program</span></div>
        </div>

        <!-- Detail Conference -->
        @foreach ($conferences as $conference)
            <div class="text-center mb-4 p-4 rounded shadow-sm bg-light">
                <h1 class="fw-bold text-primary">{{ $conference->title }}</h1>
                <p class="fs-5 text-muted">{{ $conference->theme }}</p>
                <p class="text-muted mb-1"><strong>Hosted by:</strong> {{ $conference->university }}</p>
                <p class="text-muted mb-1"><strong>Location:</strong> {{ $conference->hosted }}</p>
                <p class="fw-bold text-dark"><i class="bi bi-calendar-event"></i> {{ $conference->date }}</p>
            </div>
        @endforeach

        <!-- Dropdown Pilihan Day -->
        <div class="d-flex justify-content-start mb-3">
            <div class="w-25">
                <label for="dayFilter" class="form-label fw-bold">Select Day:</label>
                <select id="dayFilter" class="form-select w-auto">
                    @foreach ($daysAvailable as $day)
                        <option value="{{ $day }}" {{ $day == $selectedDay ? 'selected' : '' }}>Day {{ $day }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Table Program -->
        <div class="table-responsive">
            <table class="table table-hover rounded-2 overflow-hidden shadow-sm">
                <thead>
                    <tr>
                        <th scope="col" class="p-3 text-white" style="background-color:#08005e;"><i class="bi bi-clock"></i> Time</th>
                        <th scope="col" class="p-3 text-white" style="background-color:#08005e;"><i class="bi bi-journal-text"></i> Program
                        </th>
                        <th scope="col" class="p-3 text-white" style="background-color:#08005e;"><i class="bi bi-person"></i> PIC</th>
                    </tr>
                </thead>
                <tbody id="programTable">
                    @foreach ($programs as $program)
                        <tr class="align-middle">
                            <td class="p-3">{{ $program->start_time }} - {{ $program->end_time }}</td>
                            <td class="p-3">{{ $program->program_name }}</td>
                            <td class="p-3">{{ $program->pic }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.getElementById('dayFilter').addEventListener('change', function() {
            const selectedDay = this.value;
            window.location.href = `{{ route('conference.program') }}?day=${selectedDay}`;
        });
    </script>

@endsection
