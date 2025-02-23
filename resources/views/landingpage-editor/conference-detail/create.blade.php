@extends('layouts.app')
@section('title', 'New Conference Detail')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Conference Detail</h4>
                <form action="{{ route('landing.conference-detail.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                            name="title" id="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="theme">Theme</label>
                        <input type="text" class="form-control @error('theme') is-invalid @enderror" 
                            name="theme" id="theme" value="{{ old('theme') }}" required>
                        @error('theme')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="university">University</label>
                        <input type="text" class="form-control @error('university') is-invalid @enderror" 
                            name="university" id="university" value="{{ old('university') }}" required>
                        @error('university')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="hosted">Hosted By</label>
                        <input type="text" class="form-control @error('hosted') is-invalid @enderror" 
                            name="hosted" id="hosted" value="{{ old('hosted') }}" required>
                        @error('hosted')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" 
                            name="date" id="date" value="{{ old('date') }}" required>
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 justify-start">
                        <a href="{{ route('landing.conference-detail.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
