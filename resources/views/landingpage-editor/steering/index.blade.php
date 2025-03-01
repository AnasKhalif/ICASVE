@extends('layouts.app')
@section('title', 'Steering Committee')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">STEERING COMMITTEE</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('landing.steering.create') }}" class="btn btn-primary mb-3">Add New</a>
        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Institusi</th>
                    <th>Country</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($committees as $index => $committee)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $committee->name }}</td>
                        <td>{{ $committee->institution }}</td>
                        <td>{{ $committee->country }}</td>
                        <td>
                            <a href="{{ route('landing.steering.edit', $committee->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.steering.destroy', $committee->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
