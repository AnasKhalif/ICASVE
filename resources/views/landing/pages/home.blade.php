@extends('layouts.landing')
@section('title', 'Home')
@section('content')
<section class="hero-img mb-5">
    <img src="images/background/bg-landing.jpg" alt="Hero Image">
    <div class="content">
        <h3 id="home" class="mb-5" style="word-spacing: 5px; letter-spacing: 2px;">
            The 2025 Brawijaya International Conference (BIC 2025)
        </h3>

        <h1 id="hero-title" class="fw-bold">Artificial Intelligence at the Crossroads:</h1>
        <h2 style="font-size: 60px;" id="hero-title">Building Sustainable Future</h2>
        <h3 class="mt-5" style="word-spacing: 5px; letter-spacing: 2px;">November 21st to 22nd, 2025 | Batam, Indonesia</h3>
    </div>
</section>

<!-- About Section -->
<section id="hero-about">
    <x-section_title title="About ICASVE 2025"></x-section_title>
    <div class="content-about">
        <div class="about-details">
            <img src="{{ asset('images/logo/logo-hostedBy.png') }}" alt="logo" class="img-fluid mb-4">
            <p class="fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aut unde quidem eligendi quibusdam incidunt, fuga ex aperiam natus saepe a vitae eum et reprehenderit sequi culpa cupiditate necessitatibus. Eius fugit, expedita debitis esse molestias error tempore quam nulla doloribus sit aliquid minima quas eum delectus repudiandae a facere nam.</p>
        </div>
        <div class="about-details">
            <p class="fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aut unde quidem eligendi quibusdam incidunt, fuga ex aperiam natus saepe a vitae eum et reprehenderit sequi culpa cupiditate necessitatibus. Eius fugit, expedita debitis esse molestias error tempore quam nulla doloribus sit aliquid minima quas eum delectus repudiandae a facere nam.</p>
            <p class="fs-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem aut unde quidem eligendi quibusdam incidunt, fuga ex aperiam natus saepe a vitae eum et reprehenderit sequi culpa cupiditate necessitatibus. Eius fugit, expedita debitis esse molestias error tempore quam nulla doloribus sit aliquid minima quas eum delectus repudiandae a facere nam.</pp
                    </div>
        </div>
</section>

<!-- Keynote Section -->
<section id="hero-speakers" style="background-color: #f9f9f9; padding:40px 20px; margin-bottom: 0; height: 100vh;">
    <x-section_title title="Keynote Speakers"></x-section_title>
    <div class="container-keynotes">
        <x-card></x-card>
        <x-card></x-card>
        <x-card></x-card>
    </div>
</section>

<!-- Invited  Section -->
<section id="hero-invited" style="padding:40px 20px; margin-top:0; background-color: #f9f9f9;">
    <x-section_title title="Invited Speakers"></x-section_title>
    <div class="container-keynotes">
        <div class="card">
            <div class="card-img-wrapper">
                <img src="images/speakers/speaker1.jpg" alt="Speaker 1">
            </div>
            <div class="card-body">
                <h5 class="card-title">Ilham A. Habibie, Dr.‐Ing., MBA</h5>
                <p class="card-text">Jabatan</p>
                <p class="card-text">Asal Institusi</p>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="card">
            <div class="card-img-wrapper">
                <img src="images/speakers/ProfRamayah.jpg" alt="Speaker 2">
            </div>
            <div class="card-body">
                <h5 class="card-title">Prof. Ramayah T.</h5>
                <p class="card-text">Professor of Technology Management</p>
                <p class="card-text">Universiti Sains Malaysia (USM)</p>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="card">
            <div class="card-img-wrapper">
                <img src="images/speakers/ProfMuhammadAshfaq.jpg" alt="Speaker 3">
            </div>
            <div class="card-body">
                <h5 class="card-title">Prof. Muhammad Asfaq</h5>
                <p class="card-text">Professor of Business Administration (Finance & Accounting)</p>
                <p class="card-text">International University of Applied Sciences</p>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="card">
            <div class="card-img-wrapper">
                <img src="images/speakers/TalebRifai.jpeg" alt="Speaker 4">
            </div>
            <div class="card-body">
                <h5 class="card-title">H.E.Dr. Taleb Rifai</h5>
                <p class="card-text">Former Secretary General</p>
                <p class="card-text">UN World Tourism Organization (UNWTO)</p>
            </div>
        </div>
        <!-- Card 5 -->
        <div class="card">
            <div class="card-img-wrapper">
                <img src="images/speakers/ProfEkoGanis.jpg" class="card-img-top" alt="Speaker 3">
            </div>
            <div class="card-body">
                <h5 class="card-title">Prof. Eko Ganis Sukoharsono, SE., M.Com.Hons., Ph.D.</h5>
                <p class="card-text">Professor of Sustainability Accounting and Head of Doctorate Program
                </p>
                <p class="card-text">Universitas Brawijaya</p>
            </div>
        </div>
        <!-- Card 6 -->
        <div class="card">
            <div class="card-img-wrapper">
                <img src="images/speakers/XiaoQin.png" class="card-img-top" alt="Speaker 3">
            </div>
            <div class="card-body">
                <h5 class="card-title">Xiao Qin, PhD</h5>
                <p class="card-text">Lecturer in Design and Interior Architecture</p>
                <p class="card-text">Shanghai University</p>
            </div>
        </div>
    </div>
</section>

<section id="hero-topics">
    <x-section_title title="Topics"></x-section_title>
    <div class="container list-topics">
        <ul>
            <li>AI in Healthcare: Innovations and Ethics
                <ul>
                    <li>The role of AI in diagnostics, treatment planning, and personalized medicine.</li>
                    <li>Ethical considerations of AI in healthcare, including patient privacy and data
                        security.</li>
                    <li>Legal frameworks for regulating AI applications in medical practice.</li>
                </ul>
            </li>
            <li>Scientific Advancements through AI
                <ul>
                    <li>AI’s contribution to scientific research, including drug discovery and climate
                        modelling.</li>
                    <li>The ethical use of AI in scientific experiments and data analysis.</li>
                    <li>The impact of AI on scientific methodologies and research integrity.</li>
                </ul>
            </li>
            <li>AI Applications
                <ul>
                    <li>AI applications for agriculture, livestock, and aquaculture.</li>
                    <li>AI applications in environmental.</li>
                    <li>AI applications in biomedical and health.</li>
                    <li>AI application in biology.</li>
                    <li>AI application in chemistry.</li>
                    <li>AI application in physics.</li>
                </ul>
            </li>
            <li>Humanities Perspectives on AI
                <ul>
                    <li>Philosophical and ethical questions about AI’s role in society.</li>
                    <li>The representation of AI in literature, art, and culture.</li>
                    <li>Humanistic approaches to understanding the societal impact of AI.</li>
                </ul>
            </li>
            <li>Legal Challenges and AI Governance
                <ul>
                    <li>Developing legal standards and policies for AI deployment.</li>
                    <li>Intellectual property and AI-generated content.</li>
                    <li>Addressing bias and ensuring fairness in AI algorithms through legal measures.</li>
                </ul>
            </li>
        </ul>
        <ul>
            <li>Interdisciplinary Approaches to AI Ethics
                <ul>
                    <li>Combining insights from medicine, science, humanities, and law to create robust AI
                        ethics frameworks.</li>
                    <li>Case studies on ethical dilemmas involving AI.</li>
                    <li>Strategies for interdisciplinary collaboration on AI ethics.</li>
                </ul>
            </li>
            <li>AI and Public Health
                <ul>
                    <li>Utilizing AI to predict and manage public health crises.</li>
                    <li>Legal and ethical considerations in the use of AI for epidemiology.</li>
                    <li>The role of humanities in shaping public health policies involving AI.</li>
                </ul>
            </li>
            <li>AI in Education and Workforce Development
                <ul>
                    <li>The impact of AI on education systems and curricula.</li>
                    <li>Preparing the workforce for an AI-driven economy.</li>
                    <li>Legal and ethical implications of AI in educational technologies.</li>
                </ul>
            </li>
            <li>AI, Society, and Human Rights
                <ul>
                    <li>The impact of AI on social justice and human rights.</li>
                    <li>Legal protections against AI discrimination.</li>
                    <li>Humanistic approaches to understanding AI’s influence on social structures.</li>
                </ul>
            </li>
            <li>AI in Animal Science, Agriculture and Fisheries
                <ul>
                    <li>Precision Feeding and Nutrition.</li>
                    <li>Reproductive Efficiency and Genetics.</li>
                    <li>Sustainable Livestock Production Systems.</li>
                    <li>Supply Chain and Market Optimization.</li>
                    <li>Farm Management and Automation.</li>
                    <li>Emerging Technologies and Innovation.</li>
                </ul>
            </li>
            <li>AI in Business and Management
                <ul>
                    <li>Economic Frontiers: The Impact of Digital Transformation on Global Business.</li>
                </ul>
            </li>
        </ul>
    </div>
</section>

<!-- -	Important Dates Section -->
<section id="important-dates">
    <x-section_title title="Important Dates"></x-section_title>
    <div class="important-dates">
        <img src="images/background/poster.jpg" alt="Important Dates Poster">
        <div class="dates">
            <ul>
                <li><span class="speaker">Abstract Submission Deadline:</span class='date'> July 2, 2024</li>
                <li><span class="speaker">Abstract Notification:</span class='date'> July 3, 2024</li>
                <li><span class="speaker">Participant (non-speaker) Registration Deadline:</span class='date'> July 10, 2024</li>
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
                <img src="images/background/widyaloka.jpg" alt="Venue Building"
                    class="img-fluid rounded shadow" style="width: 100%; max-width: 500px; height: auto;">
            </div>
            <div class="location col-md-6">
                <h3 class="text-secondary">Convention Hall Universitas Brawijaya</h3>
                <p class="text-muted">Jl. Seminar Raya No. 1, Kota Event, Indonesia</p>
                <p class="font-weight-bold">Date: November 20th - 22nd, 2024</p>
                <a href="https://maps.app.goo.gl/5goJdTDuFaAWxUWG9" target="_blank"
                    class="btn btn-primary">See on Map</a>
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
                    <img src="images/logo/logo-co1.png" alt="Co-Hosted Logo 1"
                        class="img-fluid mb-2">
                    <img src="images/logo/logo-co2.png" alt="Co-Hosted Logo 2"
                        class="img-fluid mb-2">
                </div>
            </div>
            <!-- Right Section (70%) -->
            <div class="col-md-8 p-4">
                <h4 class="text-center mb-4">Supported By</h4>
                <div class="row text-center">
                    <div class="col-md-3 col-6 mb-3">
                        <img src="images/logo/logo-7.png" alt="Sponsor Logo 1"
                            class="img-fluid">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="images/logo/logo-7.png" alt="Sponsor Logo 2"
                            class="img-fluid">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="images/logo/logo-7.png" alt="Sponsor Logo 3"
                            class="img-fluid">
                    </div>
                    <div class="col-md-3 col-6 mb-3">
                        <img src="images/logo/logo-7.png" alt="Sponsor Logo 4"
                            class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

@endsection