@extends('layouts.landing')
@section('title', 'Home')
@section('content')
    <section id="hero" class="hero section dark-background">
        <img src="{{ asset('/images/hero-bg-2.jpg') }}" alt="" class="hero-bg" />

        <div class="container d-flex align-items-center" style="min-height: 60vh;">
            <div class="row gy-4 justify-content-between">
                <div class="d-flex flex-column justify-content-center" data-aos="fade-in">
                    <h1>International Conference on Applied Science for Vocational Education - <span> ICASVE 2025</span>
                    </h1>
                    <p>Implemetation of Applied Science for Prosperity and Sustainability</p>
                    <div class="d-flex">
                        <a href="{{route('register')}}" target="_blank" class="btn-get-started">Register</a>
                    </div>
                </div>
            </div>
        </div>
        

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3"></use>
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0"></use>
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9"></use>
            </g>
        </svg>
    </section>
    <!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row align-items-center justify-content-between gy-5">
                <div class="teks-about col-12 col-xl-5 content" data-aos="fade-up">
                    <h3>About</h3>
                    <h2>ICASVE 2024</h2>
                    <p>
                        ICASVE – International Conference on Entrepreneurship, Innovation and Creativity aims to bring
                        together leading
                        academic, researchers, and practitioners to exchange and share their experiences and research
                        results on all
                        aspects of Entrepreneurship, Innovation, and Creativity. It also provides a premier
                        interdisciplinary platform for
                        researchers, practitioners, and educators to present and discuss the most recent innovations,
                        trends, and concerns
                        as well as practical challenges encountered and solutions through the conference theme
                        “Implementation of Applied
                        Science for Prosperity and Sustainability”.
                    </p>
                    <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                </div>

                <div class="d-none d-xl-block col-xl-2"></div>

                <div class="image-about col-12 col-xl-5 d-flex justify-content-end" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{ asset('/images/Lab-Vokasi.jpg') }}" class="w-100 w-md-75 animated rounded-3"
                        alt="gedung-vokasi" />
                </div>
            </div>
        </div>
    </section>
    <!-- /About Section -->

    <!-- Team Section -->
    <section id="team" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Keynote Speakers</h2>
            <div><span>Check Our</span> <span class="description-title">Keynote Speakers</span></div>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-5">
                @foreach ($keynoteSpeakers as $speaker)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="pic"><img src="{{ asset('storage/' . $speaker->image) }}" class="img-fluid"
                                    alt="" /></div>
                            <div class="member-info">
                                <h4>{{ $speaker->name }}</h4>
                                <span>{{ $speaker->institution }}</span>
                                <div class="social">
                                    <span>{{ $speaker->country }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Team Member -->
            </div>
        </div>
    </section>
    <section id="team-invited" class="team section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Invited Speakers</h2>
            <div><span>Check Our</span> <span class="description-title">Invited Speakers</span></div>
        </div>
        <!-- End Section Title -->

        <div class="container">
            <div class="row gy-5">
                @foreach ($invitedSpeakers as $speaker)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <div class="pic"><img src="{{ asset('storage/' . $speaker->image) }}" class="img-fluid"
                                    alt="" /></div>
                            <div class="member-info">
                                <h4>{{ $speaker->name }}</h4>
                                <span>{{ $speaker->institution }}</span>
                                <div class="social">
                                    <span>{{ $speaker->country }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End Team Member -->
            </div>
        </div>
    </section>
    <!-- /Team Section -->

    <div id="hero-topics" class="py-5 content-topics">
        <div class="container">
            <div class="contents-topics text-white text-left text-md-start">
                <h2 class="fw-bold text-white mb-3" data-aos="fade-up">CALL FOR PAPER</h2>
                <p data-aos="fade-up">The topics include, but are not limited to:</p>
                <ul class="list-topics" data-aos="fade-up" data-aos-delay="200">
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


    <!-- Details Section -->
    <section id="details" class="details section">
        <div class="container">
            <!-- Features Item -->
            <div class="row gy-4 align-items-center features-item">
                <div class=" col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out"
                    data-aos-delay="200">
                    <img src="{{ asset('images/poster.png') }}" class="poster-md img-fluid rounded-2" alt="" />
                </div>
                <div class="col-md-7 order-2 order-md-1">
                    <div class="container section-title" data-aos="fade-up">
                        <h2>ICASVE Conference Timeline</h2>
                        <div><span>Deadline</span> <span class="description-title"> Dates</span></div>
                    </div>
                    <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                        <img src="{{ asset('images/poster.png') }}" class="poster-sm img-fluid rounded-2"
                            alt="" />
                    </div>
                    <table class="custom-table" data-aos="fade-up" data-aos-delay="200">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Abstract Submission</td>
                                <td>July 2, 2024</td>
                            </tr>
                            <tr>
                                <td>Abstract Notification</td>
                                <td>July 3, 2024</td>
                            </tr>
                            <tr>
                                <td>Participant (non-speaker) Registration Deadline</td>
                                <td>July 10, 2024</td>
                            </tr>
                            <tr>
                                <td>Payment Deadline</td>
                                <td>July 10, 2024</td>
                            </tr>
                            <tr>
                                <td>Full Paper Deadline</td>
                                <td>July 12, 2024</td>
                            </tr>
                            <tr>
                                <td>Full Paper Deadline</td>
                                <td>July 12, 2024</td>
                            </tr>
                            <tr>
                                <td>Conference Day</td>
                                <td>July 17, 2024</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="" class="leaflet-button" data-aos="fade-up">Get Our Leaflet</a>
                </div>
            </div>
            <!-- Features Item -->

            <div class="row gy-4 align-items-center features-item">
                <div class="container">
                    <div class="container section-title" data-aos="fade-up">
                        <h2>Registration</h2>
                        <div><span>Registration</span> <span class="description-title"> Fee</span></div>
                    </div>
                    <div class="table-responsive" data-aos="fade-up" data-aos-delay="100">
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
                                @foreach ($presenter as $fee)
                                    <tr>
                                        <td>{{ $fee->category_name }}</td>
                                        <td>IDR {{ number_format($fee->domestic_participants, 0, ',', '.') }} </td>
                                        <td>US$ {{ $fee->international_participants }}</td>
                                        <td>Until {{ \Carbon\Carbon::parse($fee->period_of_payment)->format('F jS, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
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
                                @foreach ($non_presenter as $fee)
                                    <tr>
                                        <td>{{ $fee->category_name }}</td>
                                        <td>IDR {{ number_format($fee->domestic_participants, 0, ',', '.') }}</td>
                                        <td>US$ {{ $fee->international_participants }}</td>
                                        <td>Until {{ \Carbon\Carbon::parse($fee->period_of_payment)->format('F jS, Y') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <table class="table table-bordered" data-aos="fade-up">
                            <thead class="thead-light">
                                <tr>
                                    <th>Additional Fee</th>
                                    <th>Domestic Participants</th>
                                    <th>International Participants</th>
                                    <th>Period of Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($additional_fee as $fee)
                                    <tr>
                                        <td>{{ $fee->category_name }}</td>
                                        <td>{{ $fee->domestic_participants }}</td>
                                        <td>{{ $fee->international_participants }}</td>
                                        <td>
                                            @if (!empty($fee->period_of_payment) && $fee->period_of_payment !== 'TBA')
                                                Until
                                                {{ \Carbon\Carbon::parse($fee->period_of_payment)->format('F jS, Y') }}
                                            @else
                                                {{ $fee->period_of_payment }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <p class="text-muted mt-3" data-aos="fade-up">
                        <small>
                            <b>Please note:</b><br />
                            1. The registration fee serves only for conference fee, and it cannot be waived for
                            authors.<br />
                            2. Authors need to pay for publishing if accepted.<br />
                            3. Certificate fee: Participants can attend the event without certificate.
                        </small>
                    </p>

                </div>
            </div>
            <!-- Features Item -->

            <div class="row gy-4 align-items-center features-item">
                <div class="container section-title" data-aos="fade-up">
                    <h2>Venue</h2>
                    <div><span>Our</span> <span class="description-title"> Venue</span></div>
                </div>
                <div class="row align-items-start">
                    <div class="col-md-6" data-aos="fade-up">
                        <img src="{{ asset('images/widyaloka.png') }}" alt="Venue Building"
                            class="img-fluid rounded shadow" style="width: 100%; max-width: 500px; height: auto" />
                    </div>
                    <div class="location col-md-6" data-aos="fade-up">
                        <h3 class="title-location">Convention Hall Universitas Brawijaya</h3>
                        <p class="text-muted">Jl. Seminar Raya No. 1, Kota Event, Indonesia</p>
                        <p class="font-weight-bold">Date: November 20th - 22nd, 2024</p>
                        <a href="https://maps.app.goo.gl/5goJdTDuFaAWxUWG9" target="_blank"
                            class="btn btn-primary btn-map">See on Map</a>
                    </div>
                </div>
                <div class="mt-4" data-aos="fade-up">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4566125772426!2d112.6110645750068!3d-7.951675092072795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827f2d620cf1%3A0xf45788aac2a0e437!2sConvention%20Hall%20Universitas%20Brawijaya!5e0!3m2!1sid!2sid!4v1737982475129!5m2!1sid!2sid"
                        width="100%" height="400" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <!-- Features Item -->
        </div>
    </section>
    <!-- /Details Section -->

    <section id="publications-section" class="py-5 bg-light section">
        <div class="container d-flex flex-column justify-content-center">
            <div class="publications-journal container section-title" data-aos="fade-up">
                <h2>Publications</h2>
                <div><span>Publications</span> <span class="description-title"> Journal</span></div>
            </div>
            <div class="row text-center" style="display: flex; align-items: center">
                @foreach ($publications_journal as $item)
                    <div class="col-md-2 col-6 mb-3" data-aos="fade-up">
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="Logo 1" class="img-fluid" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Hosted and Supported Section -->
    <section id="hosted-supported-section" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-white p-4" style="background-color: #fbfbfb;">
                    <div class="mb-4 text-center">
                        <h4 data-aos="fade-up mb-4">Hosted By</h4>
                        @foreach ($hosted_by as $item)
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="Hosted Logo"
                                class="img-fluid mb-2 w-50 mx-auto" data-aos="fade-up">
                        @endforeach
                    </div>
                    <div class="text-center">
                        <h4 data-aos="fade-up mb-4">Co-Hosted By</h4>
                        @foreach ($co_hosted_by as $item)
                            <img src="{{ asset('storage/' . $item->image_path) }}" class="w-50 mx-auto mb-2"
                                alt="Co-Hosted Logo 1" class="img-fluid mb-2" data-aos="fade-up">
                        @endforeach

                    </div>
                </div>
                <!-- Right Section (70%) -->
                <div class="col-md-8 p-4">
                    <h4 class="text-center mb-4" data-aos="fade-up">Supported By</h4>
                    <div class="row text-center">
                        @foreach ($supported_by as $item)
                            <div class="col-md-3 col-6 mb-3">
                                <img src="{{ asset('storage/' . $item->image_path) }}" class="logo-support"
                                    alt="Sponsor Logo 1" class="img-fluid" data-aos="fade-up">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

 <!-- Faq Section -->
<section id="faq" class="faq section light-background">
    <div class="container-fluid">
        <div class="row gy-4">
            <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">
                <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                    <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit.
                    </p>
                </div>

                <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-item faq-active">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                        <div class="faq-content">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non
                                curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <!-- End Faq item -->

                    <div class="faq-item">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                        <div class="faq-content">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum
                                velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec
                                pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis
                                massa tincidunt dui.
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <!-- End Faq item -->

                    <div class="faq-item">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                        <div class="faq-content">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus
                                pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum
                                tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna
                                molestie at elementum eu facilisis sed odio morbi quis.
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <!-- End Faq item -->
                  
                <div class="text-start mt-4">
                    <a href="" class="leaflet-button" data-aos="fade-up">More Question</a>
                </div>
                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2">
                <img src="{{asset('images/faq.png')}}" class="img-fluid" alt="" data-aos="zoom-in"
                    data-aos-delay="100" />
            </div>
        </div>
    </div>
</section>
<!-- /Faq Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <div><span>Check Our</span> <span class="description-title">Contact</span></div>
        </div>
        <!-- End Section Title -->

        <div class="container" data-aos="fade" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Address</h3>
                            <p>Jl. Veteran 12-14 Malang City, East Java Indonesia</p>
                        </div>
                    </div>
                    <!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Call Us</h3>
                            <p>+6281217369484 (Kharisma)</p>
                            <p>+6281233288666 (Sovia)</p>
                        </div>
                    </div>
                    <!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Us</h3>
                            <p>icasve@ub.ac.id</p>
                        </div>
                    </div>
                    <!-- End Info Item -->
                </div>

                <div class="col-lg-8">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required="" />
                            </div>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="" />
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
