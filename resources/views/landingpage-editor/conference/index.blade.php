@extends('layouts.app')
@section('title', 'Conference Management')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">CONFERENCE MANAGEMENT</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('landing.conference.create') }}" class="btn btn-primary mb-3">Add New Conference</a>
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Theme</th>
                    <th>Date</th>
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
                        <td>
                            <a href="{{ route('landing.conference.edit', $conference->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.conference.destroy', $conference->id) }}" method="POST"
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
@endsection
