@extends('layouts.app')

@section('title', 'Landing Page')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0 text-center">Edit Landing Page</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    
                    <a href="{{ route('landing.conference-title.index') }}" class="btn btn-danger">
                        <i class="fa-solid fa-heading"></i> Title
                    </a>
                    <a href="{{ route('landing.abouts.index') }}" class="btn btn-danger">
                        <i class="fa-solid fa-info-circle"></i> About
                    </a>
                    <a href="{{ route('landing.speakers.index') }}" class="btn btn-danger">
                        <i class="fa-solid fa-microphone"></i> Speakers
                    </a>

                    <a href="{{ route('landing.registrationFee.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-dollar-sign"></i> Registration Fee
                    </a>
                    <a href="{{ route('landing.deadlines.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-calendar"></i> Deadline Dates
                    </a>

                    <a href="{{ route('landing.faq.index') }}" class="btn btn-warning">
                        <i class="fa-solid fa-question-circle"></i> FAQ
                    </a>
                    <a href="{{ route('landing.publications-journal.index') }}" class="btn btn-success">
                        <i class="fa-solid fa-book"></i> Publications Journal
                    </a>
                    <a href="{{ route('landing.poster.index') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-image"></i> Poster
                    </a>
                    <a href="{{ route('landing.contact.index') }}" class="btn btn-info">
                        <i class="fa-solid fa-envelope"></i> Contact
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection
