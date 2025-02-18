@extends('layouts.app')
@section('title', 'Deadline Dates')

@section('content')
<div class="container">
    <h2 class="my-4">Deadline Dates</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('landing.deadline-dates.create') }}" class="btn btn-primary mb-3">Add New Deadline</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deadlines as $deadline)
            <tr>
                <td>{{ $deadline->name }}</td>
                <td>{{ $deadline->date }}</td>
                <td>
                    <a href="{{ route('landing.deadline-dates.edit', $deadline->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('landing.deadline-dates.destroy', $deadline->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
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
