<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar with Scroll Effect</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Navbar Styles */
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
        }

        .navbar-transparent {
            background-color: transparent !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        }

        .navbar-black {
            background-color: rgba(15, 83, 15, 0.76) !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .navbar-black a {
            color: white !important;
        }

        .navbar a:hover {
            color: #ddd;
        }

        header {
            position: absolute;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .hero-img {
            position: relative;
            width: 100%;
            height: 100vh;
            margin-bottom: 12rem;
        }

        .hero-img img {
            width: 100%;
            object-fit: cover;
            object-position: center;
        }

        .content {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .content h3 {
            font-size: 20px;
            color: #ffff;
            font-weight: 600;
        }

        .content h1 {
            font-size: 44px;
        }

        #hero-about {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            margin-bottom: 7em;
            padding-top: 4rem;
            /* Ensure spacing to avoid navbar overlap */
        }

        .title h2 {
            font-size: 30px;
            color: #1e8d2d;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            text-transform: uppercase;
        }

        .content-about {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-align: center;
            padding: 0 2rem;
            gap: 3rem;
        }

        .content-about img {
            width: 50%;
            height: auto;
            border-radius: 10px;
        }

        .content-about p {
            color: #363636;
            font-size: 18px;
            font-weight: 500;
            line-height: 1.5;
        }

        /* Card Styles */
        #hero-speakers,
        #hero-invited {
            margin-bottom: 5em;
            padding-top: 2rem;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            justify-content: center;
            align-content: center;
            padding: 0 1rem;
            margin: 2rem auto;
            max-width: 1200px;
        }

        .card {
            width: 100%;
            max-width: 300px;
            /* Ensures cards are consistent in width */
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
        }

        .card-img-wrapper {
            width: 100%;
            height: 250px;
            /* Ensures consistent image height */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f0f0f0;
            /* Placeholder background */
        }

        .card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures image fits and maintains aspect ratio */
        }

        .card-body {
            padding: 1rem;
            text-align: center;
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: #1e8d2d;
            margin-bottom: 0.5rem;
        }

        .card-text {
            font-size: 16px;
            color: #363636;
            margin-bottom: 0.5rem;
        }

        .list-topics {
            display: flex;
            justify-content: space-between;
        }

        #hero-topics {
            margin: 5em 0;
            padding-top: 2rem;
        }

        #hero-topics ul {
            list-style-type: none;
            padding-left: 0;
            font-size: 18px;
            color: #363636;
            width: 90%;
        }

        #hero-topics ul>li {
            margin-bottom: 1.5rem;
            font-weight: bold;
        }

        #hero-topics ul>li::before {
            content: counters(section, " " .) " ";
            counter-increment: section;
            font-weight: bold;
        }

        #hero-topics ul li ul {
            list-style-type: disc;
            padding-left: 2rem;
            margin-top: 0.5rem;
            font-weight: normal;
        }

        #hero-topics ul li ul li {
            margin-bottom: 0.5rem;
        }

        /* Important Dates Styles */
        .important-dates {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            margin-top: 2rem;
        }

        .important-dates img {
            width: 40%;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dates ul {
            list-style-type: none;
            padding: 0;
            font-size: 18px;
            color: #363636;
        }

        .dates ul li {
            margin-bottom: 1rem;
            padding: 1rem;
            background-color: #fff;
            border-left: 5px solid #1e8d2d;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .dates ul li span {
            font-weight: bold;
            color: #1e8d2d;
        }
    </style>
</head>

<body>
    <div id="landing-page">
        <!-- Header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-transparent">
                <div class="container">
                    <!-- Logo/Image -->
                    <a class="navbar-brand" href="#">
                        <img src="images/logo/logo-header.png" alt="Logo" height="45" style="padding: 4px">
                    </a>

                    <!-- Toggler for mobile view -->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Links -->
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#landing-page">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#hero-about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#hero-speakers">Speakers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#hero-topics">Topics</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#important-dates">Important Dates</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#regist-section">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#publications-section">Publications</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <main>
            <!-- Hero Image -->
            <section class="hero-img">
                <img src="images/background/bg-landing.jpg" alt="Hero Image">
                <div class="content">
                    <h3 id="home">The 2025 Brawijaya International Conference (BIC 2025)</h3>
                    <h1>Artificial Intelligence at the Crossroads:</h1>
                    <h1>Building Sustainable Future</h1>
                    <h3>November 21st to 22nd, 2025 | Batam, Indonesia</h3>
                </div>
            </section>

            <!-- About Section -->
            <section id="hero-about">
                <div class="title">
                    <h2>ABOUT ICASVE 2025</h2>
                </div>
                <div class="container content-about">
                    <img src="images/background/gedung-vokasi.jpg" alt="img-vokasi">
                    <p>
                        The 2025 Brawijaya International Conference (BIC 2025) is a prestigious event that brings
                        together
                        experts, scholars, and professionals from various fields to explore the intersection of
                        Artificial Intelligence and Sustainable Development. The conference aims to foster collaboration
                        and knowledge exchange, and provide a platform for researchers, policymakers, and practitioners
                        to address complex challenges related to Artificial Intelligence and Sustainable Development.
                    </p>
                </div>
            </section>

            <!-- Keynote Section -->
            <section id="hero-speakers">
                <div class="title">
                    <h2>Keynote Speakers</h2>
                </div>
                <div class="container cards-container">
                    <!-- Card 1 -->
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
                    <!-- Card 7 -->
                    <div class="card">
                        <div class="card-img-wrapper">
                            <img src="images/speakers/" class="card-img-top" alt="Speaker 3">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Politeknik Batam</h5>
                            <p class="card-text">-</p>
                            <p class="card-text">Politeknik Negeri Batam</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Invited  Section -->
            <section id="hero-invited ">
                <div class="title">
                    <h2>Invited Speakers</h2>
                </div>
                <div class="container cards-container">
                    <!-- Card 1 -->
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
                    <!-- Card 7 -->
                    <div class="card">
                        <div class="card-img-wrapper">
                            <img src="images/speakers/" class="card-img-top" alt="Speaker 3">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Politeknik Batam</h5>
                            <p class="card-text">-</p>
                            <p class="card-text">Politeknik Negeri Batam</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Topics Section -->
            <section id="hero-topics">
                <div class="title">
                    <h2>Topics</h2>
                </div>
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
                <div class="title">
                    <h2>Important Dates</h2>
                </div>
                <div class="container important-dates">
                    <img src="images/background/poster.jpg" alt="Important Dates Poster">
                    <div class="dates">
                        <ul>
                            <li><span>Abstract Submission Deadline:</span> July 2, 2024</li>
                            <li><span>Abstract Notification:</span> July 3, 2024</li>
                            <li><span>Participant (non-speaker) Registration Deadline:</span> July 10, 2024</li>
                            <li><span>Payment Deadline:</span> July 10, 2024</li>
                            <li><span>Full Paper Deadline:</span> July 12, 2024</li>
                            <li><span>Conference Day:</span> July 17, 2024</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- Registration Section -->
            <section id="regist-section">
                <div class="title text-center my-4">
                    <h2>Registration Fee</h2>
                </div>
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
                        <div class="col-md-4">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <p><b>Bank Mandiri</b></p>
                                    <p>Kode VA: 898187743</p>
                                    <p>Seminar Dan Kegiatan Sejenis Yang Menunjang Biaya</p>
                                    <p>Unit Kerja: Direktorat Administrasi dan Layanan Akademik</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-warning">
                                <div class="card-body">
                                    <p><b>Bank Nasional Indonesia</b></p>
                                    <p>Kode VA: 988081657743000</p>
                                    <p>Seminar Dan Kegiatan Sejenis Yang Menunjang Biaya</p>
                                    <p>Unit Kerja: Direktorat Administrasi dan Layanan Akademik</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
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
            <section id="venue-section" class="py-5">
                <div class="container">
                    <div class="title">
                        <h2>Venue</h2>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <img src="images/background/widyaloka.jpg" alt="Venue Building"
                                class="img-fluid rounded shadow" style="width: 100%; max-width: 500px; height: auto;">
                        </div>
                        <div class="col-md-6">
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
                <div class="container">
                    <div class="title">
                        <h2>Publications</h2>
                    </div>
                    <div class="row text-center" style="display:flex; align-items: center;">
                        <!-- Example for logos per row -->
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
                                <!-- Example for sponsor logos per row -->
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
            </section>

        </main>

        <!-- Footer Section -->
        <footer id="footer-section" class="py-5 bg-dark text-white">
            <div class="container">
                <div class="row" style="display:flex; align-items: flex-start; justify-content: space-evenly;">
                    <!-- Left Section -->
                    <div class="col-md-4">
                        <h5>ICASVE</h5>
                        <p class="text-white">ICASVE (International Conference on Applied Science, Vocational
                            Education) is a prestigious event aimed at fostering innovation and collaboration in
                            vocational education and applied sciences.</p>
                    </div>
                    <!-- Middle Section -->
                    <div class="col-md-4">
                        <h5>Contact</h5>
                        <p class="text-white">Vokasi, Universitas Brawijaya</p>
                        <p class="text-white">Jl. Veteran Malang, East Java, Indonesia 65145</p>
                        <p><a href="https://wa.me/1234567890" class="text-white">WhatsApp: +62 8xxxxxxxxxxx</a></p>
                        <p><a href="https://wa.me/0987654321" class="text-white">WhatsApp: +62 8xxxxxxxxxxx</a></p>
                    </div>
                    <!-- Right Section -->
                    <div class="col-md-4 text-center" style="display:flex; gap:2rem; align-items: center;">
                        <img src="images/logo/ub.png" alt="UB Logo" style="height:4rem;">
                        <img src="images/logo/vokasi.jpg" alt="Vokasi Logo" style="height:3rem;">
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scroll Effect Script -->
    <script>
        document.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 10) {
                navbar.classList.remove("navbar-transparent");
                navbar.classList.add("navbar-black");
            } else {
                navbar.classList.add("navbar-transparent");
                navbar.classList.remove("navbar-black");
            }
        });

        // Smooth scrolling with offset
        document.querySelectorAll("a.nav-link").forEach(anchor => {
            anchor.addEventListener("click", function(e) {
                e.preventDefault();
                const targetId = this.getAttribute("href").slice(1);
                const targetElement = document.getElementById(targetId);
                const offset = document.querySelector(".navbar").offsetHeight;

                window.scrollTo({
                    top: targetElement.offsetTop - offset,
                    behavior: "smooth"
                });
            });
        });
    </script>
</body>

</html>
