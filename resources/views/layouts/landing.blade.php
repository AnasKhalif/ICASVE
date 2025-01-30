<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/landingpage.css' )}}">
    <title>
        @hasSection('title')
        @yield('title') | ICasve 2025 @else
        ICasve @endif
    </title>
</head>

<body>
    @include('layouts.landingpartials.header')
    <main class="w-full">
        @yield('content')
    </main>
    @include('layouts.landingpartials.footer')
    @include('layouts.landingpartials.script')
</body>

</html>