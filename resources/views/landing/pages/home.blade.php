@extends('layouts.landing')
@section('title', 'Home')
@section('content')
    <section id="landing-page" class="hero-img d-flex align-items-center">
        <div class="container text-center text-white">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <h1 class="text-style">
                        3<sup class="superscript">rd</sup> ICASVE 2024 - International Conference on Applied Science for
                        Vocational Education
                    </h1>
                    <p class="subtitle">
                        Implementation of Applied Science for Prosperity and Sustainability
                    </p>
                    <a href="#" class="btn btn-register">REGISTER ➜</a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="hero-about" class="pb-5 px-3">
        {{-- <x-section_title title="About ICASVE 2025"></x-section_title> --}}
        <div class="container">
            <div class="row align-items-center gx-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <img src="{{ asset('images/background/Lab-Vokasi.jpg') }}" alt="logo"
                        class="img-fluid img-responsive">
                </div>
                <div class="col-lg-6">
                    <h3 class="sub-title text-warning">About Conference</h3>
                    <h2 class="fw-bold" style="color: #1f3969;">ICASVE 2024</h2>
                    <p class="text-muted text-justify">
                        ICASVE – International Conference on Entrepreneurship, Innovation and Creativity aims to bring
                        together
                        leading academic, researchers, and practitioners to exchange and share their experiences and
                        research
                        results on all aspects of Entrepreneurship, Innovation, and Creativity. It also provides a premier
                        interdisciplinary platform for researchers, practitioners, and educators to present and discuss the
                        most
                        recent innovations, trends, and concerns as well as practical challenges encountered and solutions
                        through the conference theme “Implementation of Applied Science for Prosperity and Sustainability”.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Keynote Section -->
    <section id="hero-speakers" class="pb-5 px-3">
        <div class="container">
            <h2 class="fw-bold mb-4" style="color: #1f3969;">Keynote Speaker</h2>
            <div class="d-flex flex-wrap justify-content-center card-speakers">
                @foreach ($keynotes as $keynote)
                    <div class="d-flex align-items-center speaker-card">
                        <img src="{{ asset('images/speakers/' . $keynote['image']) }}" alt="{{ $keynote['name'] }}"
                            class="rounded-circle speaker-img">
                        <div>
                            <h5 class="fw-bold mb-1">{{ $keynote['name'] }}</h5>
                            <p class="text-muted mb-0">{{ $keynote['university'] }}</p>
                            <p class="text-muted">{{ $keynote['country'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Invited Speakers Section -->
    <section id="hero-invited" class="py-5 px-3" style="background: #eef1f5;">
        <div class="container">
            <h2 class="fw-bold mb-4" style="color: #1f3969;">Invited Speakers</h2>
            <div class="d-flex flex-wrap justify-content-center card-speakers">
                @foreach ($speakers as $speaker)
                    <div class="d-flex align-items-center speaker-card">
                        <img src="{{ asset('images/speakers/' . $speaker['image']) }}" alt="{{ $speaker['name'] }}"
                            class="rounded-circle speaker-img">
                        <div>
                            <h5 class="fw-bold mb-1">{{ $speaker['name'] }}</h5>
                            <p class="text-muted mb-0">{{ $speaker['university'] }}</p>
                            <p class="text-muted">{{ $speaker['country'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="hero-topics" class="py-5 content-topics">
        <div class="overlay d-flex align-items-center">
            <div class="container contents-topics text-white text-left text-md-start">
                <h2 class="fw-bold">CALL FOR PAPER</h2>
                <p>The topics include, but are not limited to:</p>
                <ul class="list-topics">
                    <li>Economic and Business</li>
                    <li>Technological Engineering</li>
                    <li>Design Innovation</li>
                    <li>Governance and Public Administration</li>
                    <li>Environment and Conservation</li>
                    <li>Corporate Social Responsibility</li>
                    <li>Tourism and Hospitality</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Important Dates Section -->
    <section id="important-dates" class="container py-5">
        <div class="text-left mb-4 content-timeline">
            <h3>Deadline Dates</h3>
            <h2>ICASVE Conference Timeline</h2>
        </div>

        <div class="content-detail">
            <div class="image-container text-center">
                <img src="images/background/poster.jpg" alt="Important Dates Poster" class="img-fluid rounded">
            </div>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table-dates w-100">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($timeline as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['date'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="regist-section" class="container">
        <x-section_title title="Registration Fee"></x-section_title>
        <div class="container content-regist">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Presenter</th>
                            <th>Domestic Participants</th>
                            <th>International Participants</th>
                            <th>Period of Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Regular (Early Bird)</td>
                            <td>IDR 2,000,000</td>
                            <td>US$ 200</td>
                            <td>Until September 20th, 2024</td>
                        </tr>
                        <tr>
                            <td>Regular</td>
                            <td>IDR 2,500,000</td>
                            <td>US$ 250</td>
                            <td>Until November 8th, 2024</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Non-Presenter</th>
                            <th>Domestic Participants</th>
                            <th>International Participants</th>
                            <th>Period of Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Additional Presenter or Attendant (Online Attendance)</td>
                            <td>IDR 500,000</td>
                            <td>US$ 50</td>
                            <td>Until November 8th, 2024</td>
                        </tr>
                        <tr>
                            <td>Additional Presenter or Attendant (On-Spot Attendance)</td>
                            <td>IDR 1,000,000</td>
                            <td>US$ 100</td>
                            <td>Until November 8th, 2024</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Additional Fee</th>
                            <th>Domestic Participants</th>
                            <th>International Participants</th>
                            <th>Period of Payment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Journal Publication (Selected Article)</td>
                            <td>TBA</td>
                            <td>TBA</td>
                            <td>TBA</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="text-muted mt-3">
                <small>
                    <b>Please note:</b><br>
                    1. The registration fee serves only for conference fee, and it cannot be waived for
                    authors.<br>
                    2. Authors need to pay for publishing if accepted.<br>
                    3. Certificate fee: Participants can attend the event without certificate.
                </small>
            </p>

            <div class="row text-center mt-5">
                <div class="bank col-md-4">
                    <div class="card border-primary">
                        <div class="card-body">
                            <p><b>Bank Mandiri</b></p>
                            <p>Kode VA: 898187743</p>
                            <p>Seminar Dan Kegiatan Sejenis Yang Menunjang Biaya</p>
                            <p>Unit Kerja: Direktorat Administrasi dan Layanan Akademik</p>
                        </div>
                    </div>
                </div>
                <div class="bank col-md-4">
                    <div class="card border-warning">
                        <div class="card-body">
                            <p><b>Bank Nasional Indonesia</b></p>
                            <p>Kode VA: 988081657743000</p>
                            <p>Seminar Dan Kegiatan Sejenis Yang Menunjang Biaya</p>
                            <p>Unit Kerja: Direktorat Administrasi dan Layanan Akademik</p>
                        </div>
                    </div>
                </div>
                <div class="bank col-md-4">
                    <div class="card border-danger">
                        <div class="card-body">
                            <p><b>Bank Jatim</b></p>
                            <p>Kode VA: 151637743000</p>
                            <p>Seminar Dan Kegiatan Sejenis Yang Menunjang Biaya</p>
                            <p>Unit Kerja: Direktorat Administrasi dan Layanan Akademik</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-success btn-lg">Payment Proof Upload and Attendance
                    Confirmation ➜</button>
            </div>
        </div>
    </section>

    <!-- Venue Section -->
    <section id="venue-section" class="container py-5">
        <h3 class="title-venue text-left">Venue</h3>
        <div class="row content-venue align-items-start">
            <div class="col-lg-6 col-md-12">
                <img src="images/background/widyalokaub.jpg" alt="Venue Building" class="img-fluid rounded shadow">
                <h3 class="mt-3">Convention Hall Universitas Brawijaya</h3>
                <p>Jl. Seminar Raya No. 1, Kota Event, Indonesia</p>
                <p>Date: November 20th - 22nd, 2024</p>
                <a href="https://maps.app.goo.gl/5goJdTDuFaAWxUWG9" target="_blank" class="btn btn-primary">See on
                    Map</a>
            </div>
            <div class="col-lg-6 col-md-12 mt-4 mt-lg-0">
                <iframe class="w-100 h-100 rounded" style="min-height: 500px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4566125772426!2d112.6110645750068!3d-7.951675092072795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827f2d620cf1%3A0xf45788aac2a0e437!2sConvention%20Hall%20Universitas%20Brawijaya!5e0!3m2!1sid!2sid!4v1737982475129!5m2!1sid!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>


    <!-- Publications Section -->
    <section id="publications-section" class="content-publication">
        <div class="content-overlay">
            <!-- Journal Section -->
            <div class="container content-jurnal">
                <h3 class="title">Journal:</h3>
                <div class="container logo-jurnal">
                    @foreach ($publicationJurnal as $logo)
                        <img src="{{ asset($logo['src']) }}" alt="{{ $logo['name'] }}">
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Hosted and Supported Section -->
    <section id="hosted-supported-section">
        <div class="container">
            <div class="content-hosted">
                <!-- Left Section (30%) -->
                <div class="hosted-logo">
                    <div class="hosted-by">
                        <h4>Hosted By</h4>
                        <span class="hb-logo">
                            <img src="images/logo/logo-hostedBy.png" alt="Hosted Logo" class="img-fluid mb-2">
                        </span>
                    </div>
                    <div class="co-hosted-by">
                        <h4>Co-Hosted By</h4>
                        <span class="hb-logo">
                            <img src="images/logo/logo-co1.png" alt="Co-Hosted Logo 1" class="img-fluid mb-2">
                            <img src="images/logo/logo-co2.png" alt="Co-Hosted Logo 2" class="img-fluid mb-2">
                        </span>
                    </div>
                </div>
                <!-- Right Section (70%) -->
                <div class="sponsor-logo">
                    <h4>Supported By</h4>
                    <div class="ds-logo">
                        @foreach ($publicationJurnal as $logo)
                            <img src="{{ asset($logo['src']) }}" alt="{{ $logo['name'] }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
