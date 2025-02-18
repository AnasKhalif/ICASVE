@extends('layouts.landing')

@section('title', 'Conference Program')

@section('content')

<section class="conference">
    <div class="container my-5">
        <div class="text-center">
            <h1><i class="fa-solid fa-calendar-check"></i> Conference Program</h1>
            <p class="fs-5 text-muted">Rundown The 3rd ICASVE 2024</p>
            <p class="fw-bold">(International Conference on Applied Science for Vocational Education)</p>
            <p class="text-muted">Hybrid Conference | Faculty of Vocational Studies, Universitas Brawijaya</p>
            <p class="text-muted">Co-hosted by State Polytechnic of Batam & State University of Malang</p>
            <p class="fw-bold">October 23rd, 2024 - Batam</p>
        </div>
    
        <div class="table-responsive">
            <table class="table table-hover shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th scope="col"><i class="fa-solid fa-clock icon"></i> Time</th>
                        <th scope="col"><i class="fa-solid fa-book-open icon"></i> Program</th>
                        <th scope="col"><i class="fa-solid fa-user icon"></i> PIC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>06:30 - 07:30</td>
                        <td>Preparation</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>07:30 - 08:30</td>
                        <td>Registration</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>08:30 - 08:35</td>
                        <td>Opening by MC</td>
                        <td>MC UB & MC Batam</td>
                    </tr>
                    <tr>
                        <td>08:35 - 08:40</td>
                        <td>Welcome Speech</td>
                        <td>Conference Chair</td>
                    </tr>
                    <tr>
                        <td>08:40 - 09:30</td>
                        <td>Keynote Speaker 1</td>
                        <td>Prof. Tomohiro Kuroda (Kyoto University, Japan)</td>
                    </tr>
                    <tr>
                        <td>09:30 - 10:00</td>
                        <td>Morning Break</td>
                        <td>-</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection