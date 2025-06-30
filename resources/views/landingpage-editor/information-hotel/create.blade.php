@extends('layouts.app')

@section('title', 'Create Hotel Information')

@push('styles')
    <style>
        .form-control {
            border-radius: 10px;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-dark fw-bold mb-4">Add New Hotel</h2>

            <form action="{{ route('landing.hotels.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Hotel Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="url" class="form-control" id="website" name="website">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (0 - 5)</label>
                    <input type="number" class="form-control" id="rating" name="rating" min="0" max="5" step="0.1" required>
                </div>

                <div class="mb-3">
                    <label for="stars" class="form-label">Stars</label>
                    <select class="form-control" id="stars" name="stars">
                        <option value="" selected disabled>Choose stars</option>
                        <option value="1">1 Star</option>
                        <option value="2">2 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="5">5 Stars</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="reviews_count" class="form-label">Review Count</label>
                    <input type="number" class="form-control" id="reviews_count" name="reviews_count" min="0" value="0">
                </div>

                <div class="mb-3">
                    <label for="map_url" class="form-label">Map URL</label>
                    <input type="url" class="form-control" id="map_url" name="map_url" placeholder="https://maps.google.com/...">
                </div>

                <button type="submit" class="btn btn-primary">Create Hotel</button>
            </form>
        </div>
    </section>
@endsection
