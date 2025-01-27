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
            color: black;
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
            widht: 100%;

        }

        .content h3{
            font-size: 20px;
            color: #ffff;
            font-weight: 600;

        }

        .content h1{
            font-size: 44px;

        }

        


    </style>
</head>

<body>
    {{-- Header --}}
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-transparent">
            <div class="container">
                <!-- Logo/Image -->
                <a class="navbar-brand" href="#">
                    <img src="images/logo/logo-bic-dies.png" alt="Logo" height="40">
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
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    {{-- Hero Section --}}
    <main>
        <div class="hero-img">
            <img src="images/background/bg-landing.jpg" alt="Hero Image">
            <div class="content">
                <h3 id="home">The 2025 Brawijaya International Conference (BIC 2025)</h3>
                <h1>Artificial Intelligence at the Crossroads:</h1>
                <h1>Building Sustainable Future</h1>
                <h3>November 21st to 22nd, 2024 | Batam, Indonesia</h3>
            </div>
        </div>
    </main>

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
    </script>
</body>

</html>
