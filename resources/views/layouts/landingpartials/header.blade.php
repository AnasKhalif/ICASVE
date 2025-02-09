<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('images/logo-icasve-white.png') }}" width="200" height="100%" alt="Logo" />
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('home') }}" class="active">Home</a></li>
                <li class="dropdown">
                    <a href="#"><span>Committe</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('committee.steering') }}">Steering Committe</a></li>
                        <li><a href="{{ route('committee.reviewer') }}">Reviewer</a></li>
                        <li><a href="{{ route('committee.organizing') }}">Organizing Committe</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="{{route('submissions')}}"><span>Submission</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('submission.abstract') }}">Abstract Submission</a></li>
                        <li><a href="{{ route('submission.fullpaper') }}">Full Paper Submission</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('conference.program') }}">Conference Program</a></li>
                <li class="dropdown">
                    <a href="#"><span>Archive</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('archive.2023') }}">ICASVE 2023</a></li>
                        <li><a href="{{ route('archive.2024') }}">ICASVE 2024</a></li>
                        <li><a href="{{ route('archive.2025') }}">ICASVE 2025</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('previous.conference') }}">Previous Conference</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>