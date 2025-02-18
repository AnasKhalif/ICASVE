@extends('layouts.app')
@section('title', 'Reviewer Committee')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">REVIEWER COMMITTEE</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('landing.reviewer-committee.create') }}" class="btn btn-primary mb-3">Add New</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Institution</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($committees as $index => $committee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $committee->name }}</td>
                        <td>{{ $committee->title }}</td>
                        <td>{{ $committee->institution }}</td>
                        <td>
                            <a href="{{ route('landing.reviewer-committee.edit', $committee->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.reviewer-committee.destroy', $committee->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
