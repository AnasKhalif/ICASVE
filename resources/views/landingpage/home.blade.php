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
                        <a href="{{ route('register') }}" class="btn-get-started">Register</a>
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
            @foreach ($about as $item)
                <div class="row align-items-center justify-content-between gy-5">
                    <div class="teks-about col-12 col-xl-5 content" data-aos="fade-up">
                        <h3>About</h3>
                        <h2>{{ $item->title }}</h2>
                        <p>
                            {{ $item->content }}
                        </p>
                        <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="d-none d-xl-block col-xl-2"></div>

                    <div class="image-about col-12 col-xl-5 d-flex justify-content-end" data-aos="fade-up"
                        data-aos-delay="100">
                        <img src="{{ asset('storage/' . $about->first()->image) }}" class="w-100 w-md-75 animated rounded-3"
                            alt="gedung-vokasi" />
                    </div>
                </div>
            @endforeach
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
                    @foreach ($symposiums as $symposium)
                        <li>{{ $symposium->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    <!-- Details Section -->
    <section id="details" class="details section">
        <div class="container">
            @foreach ($posters as $poster)
                <div class="row gy-4 align-items-center features-item">
                    <div class=" col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out"
                        data-aos-delay="200">
                        <img src="{{ asset('storage/' . $poster->image) }}" class="poster-md img-fluid rounded-2"
                            alt="" />
                    </div>
                    <div class="col-md-7 order-2 order-md-1">
                        <div class="container section-title" data-aos="fade-up">
                            <h2>ICASVE Conference Timeline</h2>
                            <div><span>Deadline</span> <span class="description-title"> Dates</span></div>
                        </div>
                        <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                            <img src="{{ asset('storage/' . $poster->image) }}" class="poster-sm img-fluid rounded-2"
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
                                @foreach ($deadline_date as $date)
                                    <tr>
                                        <td>{{ $date->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($date->date)->format('F j, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{ $poster->link }}" class="leaflet-button" data-aos="fade-up">Get Our Leaflet</a>
                    </div>
                </div>
            @endforeach
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
                @foreach ($venues as $venue)
                    <div class="row align-items-start">
                        <div class="col-md-6" data-aos="fade-up">
                            <img src="{{ asset('storage/' . $venue->image_path) }}" alt="Venue Building"
                                class="img-fluid rounded shadow" style="width: 100%; max-width: 500px; height: auto" />
                        </div>
                        <div class="location col-md-6" data-aos="fade-up">
                            <h3 class="title-location">{{ $venue->venue_name }}</h3>
                            <p class="text-muted">{{ $venue->address }}</p>
                            <p class="font-weight-bold">Date: {{ $venue->date }}</p>
                            <a href="{{ $venue->map_link }}" target="_blank" class="btn btn-primary btn-map">See on
                                Map</a>
                        </div>
                    </div>

                    <div class="mt-4" data-aos="fade-up">
                        <iframe src="{{ $venue->map }}" width="100%" height="400" style="border: 0"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                @endforeach
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
                <!-- Left Section (30%) -->
                <div class="col-md-4 text-white p-4" style="background-color: #fbfbfb;">
                    <div class="mb-4 text-center">
                        <h4 data-aos="fade-up mb-4">Hosted By</h4>
                        @foreach ($hosted_by as $item)
                            <img src="{{ asset('storage/' . $item->image_path) }}" alt="Hosted Logo"
                                class="img-fluid mb-3 w-50 mx-auto" data-aos="fade-up">
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
                            Temukan jawaban dari pertanyaan yang sering diajukan mengenai konferensi ini.
                        </p>
                    </div>

                    <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
                        @foreach ($faqs as $index => $faq)
                            <div class="faq-item {{ $index === 0 ? 'faq-active' : '' }}">
                                <i class="faq-icon bi bi-question-circle"></i>
                                <h3>{{ $faq->title }}</h3>
                                <div class="faq-content">
                                    <p>{{ $faq->description }}</p>
                                </div>
                                <i class="faq-toggle bi bi-chevron-right"></i>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- <div class="col-lg-5 order-1 order-lg-2">
                    <img src="assets/images/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in"
                        data-aos-delay="100" />
                </div> --}}
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
                    @foreach ($contacts as $contact)
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>{{ $contact->phone }}</p>
                            </div>
                        </div>

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ $contact->email }}</p>
                            </div>
                        </div>
                    @endforeach
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
