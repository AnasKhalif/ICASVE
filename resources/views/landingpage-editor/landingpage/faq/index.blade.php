@extends('layouts.app')
@section('title', 'FAQ')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold text-uppercase">FAQ</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('landing.faq.create') }}" class="btn btn-primary">Add FAQ</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $faq->title }}</td>
                        <td>
                            <a href="{{ route('landing.faq.edit', $faq->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.faq.destroy', $faq->id) }}" method="POST"
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
