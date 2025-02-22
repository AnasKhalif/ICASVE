@extends('layouts.landing')

@section('title', 'Organizing Committee')

@section('content')
    <section id="reviewer" class="steering-committee section">
        <div class="container" data-aos="fade-up">
            <h2 class="title-committee">Organizing Committee ({{ $latestYear }})</h2>
            <div class="line bg-success mx-auto rounded-pill" style="height: 2px;"></div>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="committee-container">
                <div class="container mt-5">
                    <div class="row">
                        @php
                            $categories = $committees->groupBy('category'); // Kelompokkan berdasarkan kategori
                        @endphp

                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                @foreach ($categories->slice(0, ceil($categories->count() / 2)) as $category => $members)
                                    <li><strong>{{ $category }}</strong><br>
                                        @foreach ($members as $member)
                                            {{ $member->name }}<br>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <ul class="list-unstyled">
                                @foreach ($categories->slice(ceil($categories->count() / 2)) as $category => $members)
                                    <li><strong>{{ $category }}</strong><br>
                                        @foreach ($members as $member)
                                            {{ $member->name }}<br>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
