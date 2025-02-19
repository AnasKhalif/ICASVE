@extends('layouts.app')
@section('title', 'Gallery')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Gallery</h4>
                    <a href="{{ route('landing.gallery.create') }}" class="btn btn-sm btn-success">New Gallery</a>
                </div>
                <p class="card-description">
                    List of Gallery
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gallery</th>
                                <th>Tahun</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallery as $image)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="Gallery Image"
                                            style="max-width: 250px;">
                                    </td>
                                    <td>{{ $image->year }}</td>
                                    <td>
                                        <a href="{{ route('landing.gallery.edit', $image->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('landing.gallery.destroy', $image->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
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
