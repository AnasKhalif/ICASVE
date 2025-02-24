@extends('layouts.landing')

@section('title', 'ICASVE Archives')

@section('content')
<div class="container mt-5">
    <h1 class="text-center fw-bold mb-4">ICASVE Archives</h1>

    <div class="row">
        <!-- Sidebar Archives -->
        <div class="col-md-3">
            <div class="list-group" id="year-list">
                @foreach ($years as $year)
                    <a href="javascript:void(0)" class="list-group-item list-group-item-action year-link"
                       data-year="{{ $year }}">
                        ICASVE - {{ $year }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="p-4 border rounded bg-light">
                <h2 class="fw-bold text-dark" id="year-title">Abstracts - {{ $years->first() }}</h2>

                <div id="abstract-list">
                    <p class="text-center text-muted">Loading...</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function loadAbstracts(year) {
        document.getElementById("year-title").innerText = "Abstracts - " + year;
        document.getElementById("abstract-list").innerHTML = "<p class='text-center text-muted'>Loading...</p>";

        fetch("{{ url('archives') }}/" + year)
            .then(response => response.text())
            .then(data => {
                document.getElementById("abstract-list").innerHTML = data;
            })
            .catch(error => console.error("Error:", error));
    }

    // Load the first year's abstracts by default
    loadAbstracts("{{ $years->first() }}");

    document.querySelectorAll(".year-link").forEach(item => {
        item.addEventListener("click", function() {
            let year = this.getAttribute("data-year");
            loadAbstracts(year);
        });
    });
});
</script>
@endsection
