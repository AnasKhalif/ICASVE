@extends('layouts.app')
@section('title', 'Speaker')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold text-uppercase">Speaker</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('landing.speakers.create') }}" class="btn btn-primary">Add Speaker</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>institution</th>
                    <th>role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($speakers as $speaker)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $speaker->name }}</td>
                        <td>{{ $speaker->institution }}</td>
                        <td> {{ str_replace('_', ' ', $speaker->role) }} </td>
                        <td>
                            <a href="{{ route('landing.speakers.edit', $speaker->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.speakers.destroy', $speaker->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are you sure?');">
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
