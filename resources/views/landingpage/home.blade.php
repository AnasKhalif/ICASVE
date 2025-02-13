@extends('layouts.landing')
@section('title', 'Home')
@section('content')
<section id="hero" class="hero section dark-background">
    <img src="{{asset('/images/hero-bg-2.jpg')}}" alt="" class="hero-bg" />

    <div class="container">
        <div class="row gy-4 justify-content-between">
            <div class="col-lg-4 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
                <!-- img -->
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-in">
                <h1>International Conference on Applied Science for Vocational Education - <span> ICASVE 2025</span></h1>
                <p>Implemetation of Applied Science for Prosperity and Sustainability</p>
                <div class="d-flex">
                    <a href="#about" class="btn-get-started">Register</a>
                </div>
            </div>
        </div>
    </div>

    <svg
        class="hero-waves"
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        viewBox="0 24 150 28 "
        preserveAspectRatio="none">
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
    <div class="container" >
        <div class="row align-items-center justify-content-between gy-5">
            <div class="teks-about col-12 col-xl-5 content"  data-aos="fade-up">
                <h3>About</h3>
                <h2>ICASVE 2024</h2>
                <p>
                    ICASVE – International Conference on Entrepreneurship, Innovation and Creativity aims to bring together leading
                    academic, researchers, and practitioners to exchange and share their experiences and research results on all
                    aspects of Entrepreneurship, Innovation, and Creativity. It also provides a premier interdisciplinary platform for
                    researchers, practitioners, and educators to present and discuss the most recent innovations, trends, and concerns
                    as well as practical challenges encountered and solutions through the conference theme “Implementation of Applied
                    Science for Prosperity and Sustainability”.
                </p>
                <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
            </div>
        
            <div class="d-none d-xl-block col-xl-2"></div>
        
            <div class="image-about col-12 col-xl-5 d-flex justify-content-end"  data-aos="fade-up" data-aos-delay="100">
                <img src="{{asset('/images/Lab-Vokasi.jpg')}}" class="w-100 w-md-75 animated rounded-3" alt="gedung-vokasi" />
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
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/ProfMuhammadAshfaq.png')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Prof. Muhammad Ashfaq</h4>
                        <span>IU International University</span>
                        <div class="social">
                            <span>Germany</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team Member -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/ProfEkoGanis.png')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Prof. Eko Ganis Sukoharsono, Ph.D</h4>
                        <span>Universitas Brawijaya</span>
                        <div class="social">
                            <span>Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team Member -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/MiratulKhusnaMufida.png')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Miratul Khusna Mufida, Ph.D</h4>
                        <span>Politeknik Negeri Batam</span>
                        <div class="social">
                            <span>Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/XiaoQin.png')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Xiao Qin, Ph.D</h4>
                        <span>Shanghai University</span>
                        <div class="social">
                            <span>China</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team Member -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/ProfRamayah.jpg')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Prof. Ramayah T</h4>
                        <span>Universiti Sains Malaysia</span>
                        <div class="social">
                            <span>Malaysia</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team Member -->

            <div class="col-lg-4 col-md-6 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="member">
                    <div class="pic">
                        <img src="{{asset('images/speakers/TalebRifai.png')}}" class="img-fluid" alt="" />
                    </div>
                    <div class="member-info">
                        <h4>H.E. Dr. Taleb Rifai</h4>
                        <span>Former Secretary General of UNWTO</span>
                        <div class="social">
                            <span>Jordan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gy-5">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/ProfMuhammadAshfaq.png')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Prof. Muhammad Ashfaq</h4>
                        <span>IU International University</span>
                        <div class="social">
                            <span>Germany</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team Member -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/ProfEkoGanis.png')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Prof. Eko Ganis Sukoharsono, Ph.D</h4>
                        <span>Universitas Brawijaya</span>
                        <div class="social">
                            <span>Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Team Member -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="member">
                    <div class="pic"><img src="{{asset('images/speakers/MiratulKhusnaMufida.png')}}" class="img-fluid" alt="" /></div>
                    <div class="member-info">
                        <h4>Miratul Khusna Mufida, Ph.D</h4>
                        <span>Politeknik Negeri Batam</span>
                        <div class="social">
                            <span>Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class=" col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                <img src="{{asset('images/poster.png')}}" class="poster-md img-fluid rounded-2" alt="" />
            </div>
            <div class="col-md-7 order-2 order-md-1">
                <div class="container section-title" data-aos="fade-up">
                    <h2>ICASVE Conference Timeline</h2>
                    <div><span>Deadline</span> <span class="description-title"> Dates</span></div>
                </div>
                <div class="mb-4" data-aos="fade-up" data-aos-delay="100">
                    <img src="{{asset('images/poster.png')}}" class="poster-sm img-fluid rounded-2" alt="" />
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
                <a href="" class="leaflet-button" data-aos="fade-up" >Get Our Leaflet</a>
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
                            <tr>
                                <td>Journal Publication (Selected Article)</td>
                                <td>TBA</td>
                                <td>TBA</td>
                                <td>TBA</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-muted mt-3" data-aos="fade-up">
                    <small>
                        <b>Please note:</b><br />
                        1. The registration fee serves only for conference fee, and it cannot be waived for authors.<br />
                        2. Authors need to pay for publishing if accepted.<br />
                        3. Certificate fee: Participants can attend the event without certificate.
                    </small>
                </p>

                <div class="d-flex justify-content-between align-items-center row text-center mt-5">
                    <div class="bank col-md-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card border-primary">
                            <div class="card-body">
                                <p><b>Bank Mandiri</b></p>
                                <p>Kode VA: 898187743</p>
                                <p>Seminar Dan Kegiatan Sejenis Yang Menunjang Biaya</p>
                                <p>Unit Kerja: Direktorat Administrasi dan Layanan Akademik</p>
                            </div>
                        </div>
                    </div>
                    <div class="bank col-md-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card border-warning">
                            <div class="card-body">
                                <p><b>Bank Nasional Indonesia</b></p>
                                <p>Kode VA: 988081657743000</p>
                                <p>Seminar Dan Kegiatan Sejenis Yang Menunjang Biaya</p>
                                <p>Unit Kerja: Direktorat Administrasi dan Layanan Akademik</p>
                            </div>
                        </div>
                    </div>
                    <div class="bank col-md-4" data-aos="fade-up" data-aos-delay="500">
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

                <div class="text-start mt-4" data-aos="fade-up">
                    <button class="btn btn-success btn-sm btn-confirm">Payment Proof Upload and Attendance Confirmation -></button>
                </div>
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
                    <img
                        src="{{asset('images/widyaloka.png')}}"
                        alt="Venue Building"
                        class="img-fluid rounded shadow"
                        style="width: 100%; max-width: 500px; height: auto" />
                </div>
                <div class="location col-md-6" data-aos="fade-up" >
                    <h3 class="title-location">Convention Hall Universitas Brawijaya</h3>
                    <p class="text-muted">Jl. Seminar Raya No. 1, Kota Event, Indonesia</p>
                    <p class="font-weight-bold">Date: November 20th - 22nd, 2024</p>
                    <a href="https://maps.app.goo.gl/5goJdTDuFaAWxUWG9" target="_blank" class="btn btn-primary btn-map">See on Map</a>
                </div>
            </div>
            <div class="mt-4" data-aos="fade-up" >
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.4566125772426!2d112.6110645750068!3d-7.951675092072795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78827f2d620cf1%3A0xf45788aac2a0e437!2sConvention%20Hall%20Universitas%20Brawijaya!5e0!3m2!1sid!2sid!4v1737982475129!5m2!1sid!2sid"
                    width="100%"
                    height="400"
                    style="border: 0"
                    allowfullscreen=""
                    loading="lazy"
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
            <div class="col-md-2 col-6 mb-3" data-aos="fade-up">
                <img src="{{asset('images/logo/logo-1.png')}}" alt="Logo 1" class="img-fluid" />
            </div>
            <div class="col-md-2 col-6 mb-3" data-aos="fade-up">
                <img src="{{asset('images/logo/logo-2.png')}}" alt="Logo 2" class="img-fluid" />
            </div>
            <div class="col-md-2 col-6 mb-3" data-aos="fade-up">
                <img src="{{asset('images/logo/logo-3.jpg')}}" alt="Logo 3" class="img-fluid" />
            </div>
            <div class="col-md-2 col-6 mb-3" data-aos="fade-up">
                <img src="{{asset('images/logo/logo-4.png')}}" alt="Logo 4" class="img-fluid" />
            </div>
            <div class="col-md-2 col-6 mb-3" data-aos="fade-up">
                <img src="{{asset('images/logo/logo-5.png')}}" alt="Logo 5" class="img-fluid" />
            </div>
            <div class="col-md-2 col-6 mb-3" data-aos="fade-up">
                <img src="{{asset('images/logo/logo-6.jpeg')}}" alt="Logo 6" class="img-fluid" />
            </div>
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
                    <h4 data-aos="fade-up">Hosted By</h4>
                    <img src="{{asset('images/logo/logo-hostedBy.png')}}" alt="Hosted Logo" class="img-fluid mb-2 w-50 mx-auto" data-aos="fade-up">
                </div>
                <div class="text-center">
                    <h4 data-aos="fade-up">Co-Hosted By</h4>
                    <img src="{{asset('images/logo/logo-co1.png')}}" class="w-50 mx-auto mb-2" alt="Co-Hosted Logo 1"
                        class="img-fluid mb-2" data-aos="fade-up">
                    <img src="{{asset('images/logo/logo-co2.png')}}" class="w-50 mx-auto" alt="Co-Hosted Logo 2"
                        class="img-fluid mb-2" data-aos="fade-up">
                </div>
            </div>
            <!-- Right Section (70%) -->
            <div class="col-md-8 p-4">
                <h4 class="text-center mb-4" data-aos="fade-up">Supported By</h4>
                <div class="row text-center">
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-7.png')}}" class="logo-support" alt="Sponsor Logo 1"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-8.png')}}" class="logo-support" alt="Sponsor Logo 2"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-9.jpg')}}" class="logo-support" alt="Sponsor Logo 3"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-10.png')}}" class="logo-support" alt="Sponsor Logo 4"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-11.jpg')}}" class="logo-support" alt="Sponsor Logo 4"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-12.png')}}" class="logo-support" alt="Sponsor Logo 4"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-13.jpeg')}}" class="logo-support" alt="Sponsor Logo 4"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="{{asset('images/logo/logo-14.png')}}" class="logo-support" alt="Sponsor Logo 4"
                            class="img-fluid" data-aos="fade-up">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section dark-background">
    <img src="assets/images/testimonials-bg.jpg" class="testimonials-bg" alt="" />

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    }
                }
            </script>
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/images/testimonials/testimonials-1.jpg" class="testimonial-img" alt="" />
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium
                                quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/images/testimonials/testimonials-2.jpg" class="testimonial-img" alt="" />
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum
                                velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/images/testimonials/testimonials-3.jpg" class="testimonial-img" alt="" />
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor
                                labore quem eram duis noster aute amet eram fore quis sint minim.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/images/testimonials/testimonials-4.jpg" class="testimonial-img" alt="" />
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim
                                dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <img src="assets/images/testimonials/testimonials-5.jpg" class="testimonial-img" alt="" />
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa
                                labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- /Testimonials Section -->

<!-- Faq Section -->
<section id="faq" class="faq section light-background">
    <div class="container-fluid">
        <div class="row gy-4">
            <div class="col-lg-7 d-flex flex-column justify-content-center order-2 order-lg-1">
                <div class="content px-xl-5" data-aos="fade-up" data-aos-delay="100">
                    <h3><span>Frequently Asked </span><strong>Questions</strong></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Duis aute irure dolor in reprehenderit
                    </p>
                </div>

                <div class="faq-container px-xl-5" data-aos="fade-up" data-aos-delay="200">
                    <div class="faq-item faq-active">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                        <div class="faq-content">
                            <p>
                                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida.
                                Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <!-- End Faq item-->

                    <div class="faq-item">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                        <div class="faq-content">
                            <p>
                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec
                                ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper
                                dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <!-- End Faq item-->

                    <div class="faq-item">
                        <i class="faq-icon bi bi-question-circle"></i>
                        <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                        <div class="faq-content">
                            <p>
                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum
                                integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt.
                                Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div>
                    <!-- End Faq item-->
                </div>
            </div>

            <div class="col-lg-5 order-1 order-lg-2">
                <img src="assets/images/faq.jpg" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100" />
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
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="" />
                        </div>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="" />
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="" />
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
            <!-- End Contact Form -->
        </div>
    </div>
</section>
<!-- /Contact Section -->
@endsection