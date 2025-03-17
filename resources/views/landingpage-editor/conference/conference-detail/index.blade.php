@extends('layouts.app')
@section('title', 'Conference TITLE')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">CONFERENCE TITLE</h2>
        <hr class="border border-success">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-between mb-3">
            <h4 class="fw-bold">List of Conference Title</h4>
            <a href="{{ route('landing.conference-detail.create') }}" class="btn btn-primary">Add Conference Title</a>
        </div>
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Theme</th>
                    <th>Date</th>
                    <th>Year</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($conferences as $index => $conference)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $conference->title }}</td>
                        <td>{{ $conference->theme }}</td>
                        <td>{{ $conference->date }}</td>
                        <td>{{ $conference->year }}</td>
                        <td>
                            <a href="{{ route('landing.conference-detail.edit', $conference->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.conference-detail.destroy', $conference->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are you sure you want to delete this?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        function filterYear() {
            const selectedYear = document.getElementById('yearFilter').value;
            const url = selectedYear === "all" ?
                `{{ route('landing.steering.index') }}` :
                `{{ route('landing.steering.index') }}?year=${selectedYear}`;
            window.location.href = url;
        }
    </script>

@endsection
