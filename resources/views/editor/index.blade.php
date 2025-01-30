@extends('layouts.app')

@section('title', 'Daftar Abstract yang Belum Direview')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Daftar Abstract yang Belum Direview</h4>
                </div>
                <p class="card-description">Abstracts yang belum mendapatkan reviewer</p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Symposium</th>
                                <th class="text-center">Presentation Type</th>
                                <th class="text-center">Status</th>
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
                                        <a href="{{ route('reviewer.editor.showAssignReviewer', $abstract->id) }}"
                                            class="btn btn-sm btn-primary">Assign Reviewer</a>
                                        <a href="{{ route('reviewer.editor.showEditStatus', $abstract->id) }}"
                                            class="btn btn-sm btn-warning">Edit Status</a>
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
