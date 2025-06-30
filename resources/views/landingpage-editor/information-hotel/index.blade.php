@extends('layouts.app')

@section('title', 'Hotel Information')

@section('content')
<div class="container card p-4">
    <h2 class="fs-5">Hotel List</h2>
    <hr class="border border-secondary">
    
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('landing.hotels.create') }}" class="btn btn-primary">Add Hotel</a>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Hotel</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hotels as $hotel)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        <img src="{{ asset('storage/' . $hotel->image) }}" alt="Hotel Image" style="max-width: 100px; border-radius: 8px;">
                    </td>

                    <td>
                        <strong>{{ $hotel->name }}</strong><br>
                        <small class="text-muted">
                            <i class="bi bi-geo-alt-fill me-1"></i>{{ Str::limit($hotel->address, 40) }}
                        </small>
                    </td>

                    <td>
                        @for ($i = 0; $i < 5; $i++)
                            @if ($i < floor($hotel->rating))
                                <i class="bi bi-star-fill text-warning"></i>
                            @elseif ($i < ceil($hotel->rating))
                                <i class="bi bi-star-half text-warning"></i>
                            @else
                                <i class="bi bi-star text-warning"></i>
                            @endif
                        @endfor
                        <br>
                        <small class="text-muted">{{ $hotel->rating }}/5</small>
                    </td>

                    <td>
                        <a href="{{ route('landing.hotels.edit', $hotel->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                        <form action="{{ route('landing.hotels.destroy', $hotel->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
