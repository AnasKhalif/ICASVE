<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @include('layouts.partials.link')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css">
    <script type="text/javascript" async
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.7/MathJax.js?config=TeX-MML-AM_CHTML"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <button class="navbar-toggler ms-3" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-start justify-content-md-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item mb-2">
                    <a class="nav-link" href="{{ route('login') }}" style="color: #2E7D32; font-weight: 500;">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a href="{{ route('register') }}" class="btn btn-success" style="background: linear-gradient(45deg, #1B5E20, #2E7D32); border: none; border-radius: 15px; padding: 8px 20px;">
                        <i class="fas fa-user-plus me-2"></i>Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<body class="h-100 m-0 p-0">
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body> 

</html>
