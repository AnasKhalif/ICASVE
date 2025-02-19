@extends('layouts.app')
@section('title', 'Participants')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Edit Leading Page</h4>
                </div>
                <div class="table-responsive pt-3 d-flex justify-content-around">
                    <a href="{{ route('landing.speakers.index') }}" class="btn btn-md btn-danger">Speakers</a>
                    <a href="{{ route('landing.registrationFee.index') }}" class="btn btn-md btn-primary">Registration
                        Fee</a>
                    <a href="{{ route('landing.deadlines.index') }}" class="btn btn-md btn-primary">Deadline Dates</a>
                    <a class="btn btn-md btn-warning">Location</a>
                    <a href="{{ route('landing.faq.index') }}" class="btn btn-md btn-primary">FAQ</a>
                    <a href="{{ route('landing.publications-journal.index') }}" class="btn btn-md btn-primary">Publications
                        Journal</a>
                    <a href="{{ route('landing.poster.index') }}" class="btn btn-md btn-primary">Publications
                        Poster</a>
                  
                </div>
            </div>
        </div>
    </div>
@endsection
