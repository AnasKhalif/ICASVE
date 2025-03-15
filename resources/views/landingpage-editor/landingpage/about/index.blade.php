@extends('layouts.app')
@section('title', 'About Section')
@section('content')
    <div class="container">
        <h2 class="mb-4">About Section</h2>
        <a href="{{ route('landing.abouts.create') }}" class="btn btn-primary mb-3">Add About</a>
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Filter Tahun -->
        <form action="{{ route('landing.abouts.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label for="filterYear" class="form-label">Filter by Year</label>
                    <select name="year" id="filterYear" class="form-select">
                        <option value="">All Years</option>
                        @foreach ($years as $year)
                            <option value="{{ $year->year }}" {{ request('year') == $year->year ? 'selected' : '' }}>
                                {{ $year->year }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        <!-- Tabel Data -->
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Year</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $index => $about)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{{ Str::limit($about->content, 100) }}</td>
                            <td>
                                @if ($about->image)
                                    <img src="{{ asset('storage/' . $about->image) }}" alt="{{ $about->title }}" width="100">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ $about->year }}</td>
                            <td>
                                <a href="{{ route('landing.abouts.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('landing.abouts.destroy', $about->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection