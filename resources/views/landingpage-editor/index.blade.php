@extends('layouts.app')
@section('title', 'Participants')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Edit Leading Page</h4>
                </div>
                <div class="d-flex flex-wrap gap-3 justify-content-between">
                    <button onclick="window.location.href='{{ route('landing.speakers.index') }}'" class="btn btn-danger btn-custom" style="width:30%;">
                        <i class="fas fa-users"></i> Speakers
                    </button>
                    <button onclick="window.location.href='#'" class="btn btn-primary btn-custom" style="width:30%;">
                        <i class="fas fa-dollar-sign"></i> Registration Fee
                    </button>
                    <button onclick="window.location.href='#'" class="btn btn-warning btn-custom" style="width:30%;">
                        <i class="fas fa-map-marker-alt"></i> Location
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
