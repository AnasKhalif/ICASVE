@extends('layouts.app')
@section('title', 'publications journal')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold text-uppercase">publications journal</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('landing.publications-journal.create') }}" class="btn btn-primary">Add publications journal</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>image type</th>
                    <th>image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publications_journals as $publications_journal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $publications_journal->image_type }}</td>
                        <td><img src="{{ asset('storage/' . $publications_journal->image_path) }}" alt="gambar" class="img-fluid"></td>
                        <td>
                            <a href="{{ route('landing.publications-journal.edit', $publications_journal->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.publications-journal.destroy', $publications_journal->id) }}" method="POST"
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
