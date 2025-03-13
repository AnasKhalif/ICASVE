<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link href="{{ asset('img/Logo_ICASVE_rmbg.png') }}" rel="icon" />
    @include('layouts.partials.link')
    @vite('resources/css/app.css')
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-scroller">
        @include('layouts.partials.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.partials.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.script')
</body>

</html>
