<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    @include('layouts.partials.link')
</head>

<body>
    <div class="container-scroller">
        @include('layouts.partials.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.partials.sidebar')
            @yield('content')
        </div>
    </div>
    @include('layouts.partials.script')
</body>

</html>
