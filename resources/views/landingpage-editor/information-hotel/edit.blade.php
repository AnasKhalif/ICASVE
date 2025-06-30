@extends('layouts.app')

@section('title', 'Edit Hotel Information')

@push('styles')
    <style>
        .form-control {
            border-radius: 10px;
        }

        .form-label {
            font-weight: bold;
        }

        .hotel-image-preview {
            max-width: 300px;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }
    </style>
@endpush

@section('content')
    <section class="py-5">
        <div class="container">
            <h2 class="text-dark fw-bold mb-4">Edit Hotel: {{ $hotel->name }}</h2>

            <form action="{{ route('landing.hotels.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    @if ($hotel->image)
                        <img src="{{ asset('storage/' . $hotel->image) }}" alt="Hotel Image" class="hotel-image-preview">
                    @else
                        <p class="text-muted">No image uploaded.</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Replace Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $hotel->address }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $hotel->phone }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $hotel->email }}">
                </div>

                <div class="mb-3">
                    <label for="website" class="form-label">Website</label>
                    <input type="url" class="form-control" id="website" name="website" value="{{ $hotel->website }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required>{{ $hotel->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating (0 - 5)</label>
                    <input type="number" class="form-control" id="rating" name="rating" value="{{ $hotel->rating }}" min="0" max="5" step="0.1" required>
                </div>

                <div class="mb-3">
                    <label for="stars" class="form-label">Stars</label>
                    <select class="form-control" id="stars" name="stars">
                        <option value="" disabled {{ is_null($hotel->stars) ? 'selected' : '' }}>Choose stars</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $hotel->stars == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <label for="reviews_count" class="form-label">Review Count</label>
                    <input type="number" class="form-control" id="reviews_count" name="reviews_count" value="{{ $hotel->reviews_count ?? 0 }}" min="0">
                </div>

                <div class="mb-3">
                    <label for="map_url" class="form-label">Map URL</label>
                    <input type="url" class="form-control" id="map_url" name="map_url" value="{{ $hotel->map_url }}" placeholder="https://maps.google.com/...">
                </div>

                <button type="submit" class="btn btn-primary">Update Hotel</button>
            </form>
        </div>
    </section>
@endsection
