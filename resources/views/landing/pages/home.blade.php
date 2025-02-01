@extends('layouts.landing')
@section('title', 'Home')
@section('content')
    <section class="hero-img">
        <div class="container content">
            <div class="text-style">
                3<sup class="superscript">rd</sup> ICASVE 2024 - International Conference on Applied Science for Vocational
                Education
            </div>
            <div class="subtitle">
                Implementation of Applied Science for Prosperity and Sustainability
            </div>
            <a href="#" class="btn-register">REGISTER ➜</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="hero-about">
        <x-section_title title="About ICASVE 2025"></x-section_title>
        <div class="container content-about">
            <img src="{{ asset('images/background/Lab-Vokasi.jpg') }}" alt="logo" class="img-fluid">
            <span class="about-desc">
                <h3 class="sub-title">About Conference</h3>
                <h2>ICASVE 2024</h2>
                <p>ICASVE – International Conference on Entrepreneurship, Innovation and Creativity aims to bring together
                    leading academic, researchers and practitioners to exchange and share their experiences and research
                    results on all aspects of Entrepreneurship, Innovation and Creativity. It also provides a premier
                    interdisciplinary platform for researchers, practitioners and educators to present and discuss the most
                    recent innovations, trends, and concerns as well as practical challenges encountered and solutions
                    through conference theme “Implemetation of Applied Science for Prosperity and Sustainability”.
                </p>
            </span>
        </div>
    </section>

    <!-- Keynote Section -->
    <section id="hero-speakers" style="background-color: #f9f9f9; padding:40px 20px; margin-bottom: 0; height: 100vh;">
        <x-section_title title="Keynote Speakers"></x-section_title>
        <div class="container content-speakers">
            <h2>Keynote Speakers</h2>
            <div class="speakers">
                @foreach ($speakers as $speaker)
                <div class="speaker">
                    <img src="{{ asset('images/speakers/' . $speaker['image']) }}" alt="{{ $speaker['name'] }}">
                    <div class="info">
                        <div class="name">{{ $speaker['name'] }}</div>
                        <div class="university">{{ $speaker['university'] }}<br>{{ $speaker['country'] }}</div>
                    </div>
                </div>
            @endforeach            
            </div>
        </div>
        {{-- <div class="container-keynotes">
            <x-card></x-card>
            <x-card></x-card>
            <x-card></x-card>
        </div>  --}}
    </section>

    <!-- Invited  Section -->
    <section id="hero-invited" style="padding:40px 20px; margin-top:0; background-color: #f9f9f9;">
        <x-section_title title="Invited Speakers"></x-section_title>
        <div class="container content-speakers">
            <h2>Invited Speakers</h2>
            <div class="speakers">
                @foreach ($speakers as $speaker)
                <div class="speaker">
                    <img src="{{ asset('images/speakers/' . $speaker['image']) }}" alt="{{ $speaker['name'] }}">
                    <div class="info">
                        <div class="name">{{ $speaker['name'] }}</div>
                        <div class="university">{{ $speaker['university'] }}<br>{{ $speaker['country'] }}</div>
                    </div>
                </div>
            @endforeach            
            </div>
        </div>
    </section>

    <section id="hero-topics">
        <x-section_title title="Topics"></x-section_title>
        <div class="content-topics">
            <div class="overlay">
                <div class="container list-topics">
                    <h2>CALL FOR PAPER</h2>
                        <p>The topics include, but are not limited:</p>
                        <ul>
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
        </div>

    <!-- -	Important Dates Section -->
    <section id="important-dates">
        <x-section_title title="Important Dates"></x-section_title>
        <div class="important-dates">
            <img src="images/background/poster.jpg" alt="Important Dates Poster">
            <div class="dates">
                <ul>
                    <li><span class="speaker">Abstract Submission Deadline:</span class='date'> July 2, 2024</li>
                    <li><span class="speaker">Abstract Notification:</span class='date'> July 3, 2024</li>
                    <li><span class="speaker">Participant (non-speaker) Registration Deadline:</span class='date'> July
                        10, 2024</li>
                    <li><span class="speaker">Payment Deadline:</span class='date'> July 10, 2024</li>
                    <li><span class=speaker"">Full Paper Deadline:</span class='date'> July 12, 2024</li>
                    <li><span class="speaker">Full Paper Deadline:</span class='date'> July 12, 2024</li>
                    <li><span class="speaker">Conference Day:</span class='date'> July 17, 2024</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="regist-section">
        <x-section_title title="Registration Fee"></x-section_title>
        <div class="container">
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
                    Confirmation -></button>
            </div>
        </div>
    </section>

    <!-- Venue Section -->
    <section id="venue-section" class="py-5 h-100">
        <div class="container d-flex flex-column justify-content-center">
            <x-section_title title="Venue"></x-section_title>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="images/background/widyaloka.jpg" alt="Venue Building" class="img-fluid rounded shadow"
                        style="width: 100%; max-width: 500px; height: auto;">
                </div>
                <div class="location col-md-6">
                    <h3 class="text-secondary">Convention Hall Universitas Brawijaya</h3>
                    <p class="text-muted">Jl. Seminar Raya No. 1, Kota Event, Indonesia</p>
                    <p class="font-weight-bold">Date: November 20th - 22nd, 2024</p>
                    <a href="https://maps.app.goo.gl/5goJdTDuFaAWxUWG9" target="_blank" class="btn btn-primary">See on
                        Map</a>
                </div>
            </div>
            <div class="mt-4">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4566125772426!2d112.6110645750068!3d-7.951675092072795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827f2d620cf1%3A0xf45788aac2a0e437!2sConvention%20Hall%20Universitas%20Brawijaya!5e0!3m2!1sid!2sid!4v1737982475129!5m2!1sid!2sid"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>
    </section>

    <!-- Publications Section -->
    <section id="publications-section" class="py-5 bg-light">
        <div class="container d-flex flex-column justify-content-center">
            <x-section_title title="Publications"></x-section_title>
            <div class="row text-center" style="display:flex; align-items: center;">
                <div class="col-md-2 col-6 mb-3">
                    <img src="images/logo/logo-1.png" alt="Logo 1" class="img-fluid">
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <img src="images/logo/logo-2.png" alt="Logo 2" class="img-fluid">
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <img src="images/logo/logo-3.jpg" alt="Logo 3" class="img-fluid">
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <img src="images/logo/logo-4.png" alt="Logo 4" class="img-fluid">
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <img src="images/logo/logo-5.png" alt="Logo 5" class="img-fluid">
                </div>
                <div class="col-md-2 col-6 mb-3">
                    <img src="images/logo/logo-6.jpeg" alt="Logo 6" class="img-fluid">
                </div>
            </div>
    </section>

    <!-- Hosted and Supported Section -->
    <section id="hosted-supported-section" class="py-5">
        <div class="container">
            <div class="row">
                <!-- Left Section (30%) -->
                <div class="col-md-4 bg-secondary text-white p-4">
                    <div class="mb-4 text-center">
                        <h4>Hosted By</h4>
                        <img src="images/logo/logo-hostedBy.png" alt="Hosted Logo" class="img-fluid mb-2">
                    </div>
                    <div class="text-center">
                        <h4>Co-Hosted By</h4>
                        <img src="images/logo/logo-co1.png" alt="Co-Hosted Logo 1" class="img-fluid mb-2">
                        <img src="images/logo/logo-co2.png" alt="Co-Hosted Logo 2" class="img-fluid mb-2">
                    </div>
                </div>
                <!-- Right Section (70%) -->
                <div class="col-md-8 p-4">
                    <h4 class="text-center mb-4">Supported By</h4>
                    <div class="row text-center">
                        <div class="col-md-3 col-6 mb-3">
                            <img src="images/logo/logo-7.png" alt="Sponsor Logo 1" class="img-fluid">
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <img src="images/logo/logo-7.png" alt="Sponsor Logo 2" class="img-fluid">
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <img src="images/logo/logo-7.png" alt="Sponsor Logo 3" class="img-fluid">
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <img src="images/logo/logo-7.png" alt="Sponsor Logo 4" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

@endsection
