<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/js/app.js')
</head>

<body>
    <section>
        <div class="navbar navbar-expand-lg bg-light custom-navbar pb-5"
            style="background-image: url('{{ asset('img/banner.jpg') }}');">
            <div
                class="container-fluid d-flex flex-column justify-content-center align-items-center text-center text-white">
                <p class="fs-4 fw-bold pt-3">The 3rd International Conference on Applied Science for Vocational Education
                </p>
                <p class="fs-6 fw-bold">REGISTRATION & ABSTRACT</p>
            </div>
        </div>
        <nav class="navbar navbar-light bg-light">
            <div class="container d-flex justify-content-center align-items-center">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active text-uppercase fw-bold text-danger text-center" aria-current="page"
                            href="#">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase fw-bold text-center" style="color: gray"
                            href="login.html">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
    </section>
    @yield('content')
</body>

</html>
