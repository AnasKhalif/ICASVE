@extends('layouts.app')
@section('title', 'conference program')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">CONFERENCE PROGRAM</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('landing.conferance-program.create') }}" class="btn btn-primary">Add Conference Program</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Time</th>
                    <th>Program</th>
                    <th>PIC</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($programs as $program)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $program->start_time }} - {{ $program->end_time }}</td>
                        <td>{{ $program->program_name }}</td>
                        <td>{{ $program->pic }}</td>
                        <td>
                            <a href="{{ route('landing.conferance-program.edit', $program->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.conferance-program.destroy', $program->id) }}" method="POST"
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
