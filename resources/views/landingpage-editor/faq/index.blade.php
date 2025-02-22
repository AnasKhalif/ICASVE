@extends('layouts.app')
@section('title', 'Faq')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">FAQ</h4>
                    <a href="{{ route('landing.faq.create') }}" class="btn btn-sm btn-success">New FAQ</a>
                </div>
                <p class="card-description">
                    List of FAQ
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
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
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action=" {{ route('landing.faq.destroy', $faq->id) }}" method="POST"
                                            style="display: inline-block;">
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
