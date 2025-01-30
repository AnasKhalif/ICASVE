@extends('layouts.app')

@section('title', 'Abstracts')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Abstracts</h4>
                    <a href="{{ route('abstracts.create') }}" class="btn btn-sm btn-success">Add Abstract</a>
                </div>
                <p class="card-description">
                    Abstracts submitted
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Symposium</th>
                                <th class="text-center">Presentation Type</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">FullPaper Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($abstracts as $key => $abstract)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-wrap">{{ $abstract->title }}</td>
                                    <td>{{ $abstract->symposium->name }}</td>
                                    <td>{{ $abstract->presentation_type }}</td>
                                    <td><span class="badge badge-info">{{ ucfirst($abstract->status) }}</span></td>
                                    <td class="text-center">
                                        @if ($abstract->fullPaper)
                                            <span
                                                class="badge badge-info">{{ ucfirst($abstract->fullPaper->status) }}</span>
                                            @if ($abstract->fullPaper)
                                                <a href="{{ asset('storage/' . $abstract->fullPaper->file_path) }}"
                                                    target="_blank" class="d-block mt-1">
                                                    <i class="mdi mdi-file-download text-primary"
                                                        style="font-size: 20px;"></i>
                                                </a>
                                            @endif
                                        @else
                                            <span class="text-muted">Not Submitted</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('abstracts.show', $abstract->id) }}"
                                            class="btn btn-sm btn-primary">Detail</a>
                                        <a href="{{ route('abstracts.edit', $abstract->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        @if ($abstract->status === 'accepted')
                                            <a href="{{ route('fullpapers.create', $abstract->id) }}"
                                                class="btn btn-sm btn-success">Upload Full Paper</a>
                                        @endif
                                        <form action="{{ route('abstracts.destroy', $abstract->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No abstracts found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $abstracts->links() }}
            </div>
        </div>
    </div>
@endsection
