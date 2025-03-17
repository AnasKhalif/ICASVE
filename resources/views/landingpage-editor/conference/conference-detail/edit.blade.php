@extends('layouts.app')
@section('title', 'Edit Conference Title')
@section('content')
    <div class="container mt-4">
        <h2 class="fw-bold">Edit Conference Title</h2>
        <hr>
        <form action="{{ route('landing.conference-detail.update', $conferenceDetail->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $conferenceDetail->title }}" required>
                <small>Example: Rundown The 4rd ICASVE 2025</small>
            </div>
            <div class="mb-4">
                <label class="form-label">Theme</label>
                <input type="text" class="form-control" name="theme" value="{{ $conferenceDetail->theme }}" required>
                <small>Example: International Conference on Applied Science for Vocational Education</small>
            </div>
            <div class="mb-4">
                <label class="form-label">University</label>
                <input type="text" class="form-control" name="university" value="{{ $conferenceDetail->university }}" required>
                <small>Example: Hybrid Conference | Faculty of Vocational Studies, Universitas Brawijaya</small>
            </div>
            <div class="mb-4">
                <label class="form-label">Hosted By or Co-Hosted By</label>
                <input type="text" class="form-control" name="hosted" value="{{ $conferenceDetail->hosted }}" required>
                <small>Example: Co-hosted by State Polytechnic of Batam & State University of Malang</small>
            </div>
            <div class="mb-4">
                <label class="form-label">Date</label>
                <input type="text" class="form-control" name="date" value="{{ $conferenceDetail->date }}" required>
                <small>Example: 4th International Conference on Applied Science for Vocational Education (ICASVE) 2025, Batam, Indonesia</small>
            </div>
            <div>
                <label class="form-label">Year</label>
                <input type="text" class="form-control" name="year" value="{{ $conferenceDetail->year }}" required>
                <small>Example: 2025</small>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
