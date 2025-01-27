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
            background-color: black !important;
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <div style="height: 200vh; padding-top: 80px;">
            <img src="" alt="">
            <h1 id="home" style="margin-top: 100px; text-align: center;">Scroll Down</h1>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Scroll Effect Script -->
    <script>
        document.addEventListener("scroll", function() {
            const navbar = document.querySelector(".navbar");
            if (window.scrollY > 50) {
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
