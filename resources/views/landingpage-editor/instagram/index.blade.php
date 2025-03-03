@extends('layouts.app')
@section('title', 'Instagram')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Instagram</h2>
        <hr class="border border-success">
        
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('landing.instagram.create') }}" class="btn btn-primary">Add Link</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($instagramLinks as $index => $link)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $link->link }}</td> 
                        
                        <td>
                            <a href="{{ route('landing.instagram.edit', $link->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.instagram.destroy', $link->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
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
