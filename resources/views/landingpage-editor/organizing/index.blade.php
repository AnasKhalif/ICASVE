@extends('layouts.app')
@section('title', 'Organizing Committee')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">ORGANIZING COMMITTEE</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('landing.organizing.create') }}" class="btn btn-primary">Add Committee</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Institution</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($committees as $index => $committee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $committee->name }}</td>
                        <td>{{ $committee->title ?? '-' }}</td>
                        <td>{{ $committee->institution ?? '-' }}</td>
                        <td>{{ $committee->category }}</td>
                        <td>
                            <a href="{{ route('landing.organizing.edit', $committee->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.organizing.destroy', $committee->id) }}" method="POST"
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
