@extends('layouts.app')

@section('title', 'List Abstract')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="card-title">Abstract</h4>
                </div>
                <p class="card-description">List All Abstract</p>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead class="">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Title</th>
                                <th>Information</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($abstracts as $key => $abstract)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-wrap">
                                        <strong>{{ $abstract->title }}</strong><br>
                                        <small>{{ $abstract->authors }}</small><br><br>
                                        <span>Symposium:</span>
                                        <strong>{{ $abstract->symposium->name }}</strong><br>
                                        <span>Requested:</span>
                                        <strong>{{ $abstract->presentation_type }}</strong>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-info">
                                            {{ ucfirst($abstract->status) }} for {{ $abstract->presentation_type }}
                                        </span><br><br>

                                        @if ($abstract->fullPaper)
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ asset('storage/' . $abstract->fullPaper->file_path) }}"
                                                    target="_blank">
                                                    <i class="fa fa-download text-primary fa-3x"></i>
                                                </a>
                                            </div>
                                        @else
                                            <span class="text-muted">Not Submitted</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.abstract.edit', $abstract->id) }}"
                                            class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.abstract.destroy', $abstract->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No abstracts found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $abstracts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
