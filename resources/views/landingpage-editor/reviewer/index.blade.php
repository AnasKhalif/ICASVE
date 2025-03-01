@extends('layouts.app')

@section('title', 'Reviewer Committee')

@section('content')
    <div class="container my-4">
        <div class="section-title text-center">
            <h2>Reviewer Committee</h2>
            <p class="text-muted">Filter and manage the reviewers by year.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="w-25">
                <label for="yearFilter" class="form-label fw-bold">Select Year:</label>
                <select id="yearFilter" class="form-select" onchange="filterYear()">
                    <option value="all" {{ request('year') == 'all' ? 'selected' : '' }}>All Years</option>
                    @foreach ($years as $year)
                        <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                            {{ $year }}
                        </option>
                    @endforeach
                </select>
            </div>
            <a href="{{ route('landing.reviewer.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add Reviewer
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Institution</th>
                        <th>Country</th>
                        <th>Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviewers as $index => $reviewer)
                        <tr class="text-center">
                            <td>{{ $index + 1 }}</td>
                            <td class="text-start">{{ $reviewer->name }}</td>
                            <td>{{ $reviewer->institution }}</td>
                            <td>{{ $reviewer->country }}</td>
                            <td>{{ $reviewer->year }}</td>
                            <td>
                                <a href="{{ route('landing.reviewer.edit', $reviewer->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('landing.reviewer.destroy', $reviewer->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No reviewers available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function filterYear() {
            const selectedYear = document.getElementById('yearFilter').value;
            window.location.href = `{{ route('landing.reviewer.index') }}?year=${selectedYear}`;
        }
    </script>
@endsection
