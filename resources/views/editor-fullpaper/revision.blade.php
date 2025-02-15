@extends('layouts.app')

@section('title', 'Full Papers with Revision Status')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Full Papers with Revision Status</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Symposium</th>
                                <th class="text-center">Reviewer</th>
                                <th class="text-center">Reviewer Comment</th>
                                <th class="text-center">Editor Decision</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fullpapers as $key => $fullpaper)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-wrap">{{ $fullpaper->title }}</td>
                                    <td>{{ $fullpaper->abstract->symposium->name }}</td>
                                    <td>
                                        @foreach ($fullpaper->fullPaperReviews as $review)
                                            <div>
                                                <strong>{{ $review->reviewer->name }}</strong><br>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($fullpaper->fullPaperReviews as $review)
                                            <div>
                                                <span>Comment:</span>
                                                <strong>{{ $review->comment ?? 'No comment' }}</strong><br><br>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-info">{{ ucfirst($fullpaper->status) }}</span><br><br>
                                        <a href="{{ route('reviewer.editor-fullpaper.showEditStatus', $fullpaper->id) }}"
                                            class="btn btn-sm btn-warning">Edit Status</a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('reviewer.editor-fullpaper.showAssignReviewer', $fullpaper->id) }}"
                                            class="btn btn-sm btn-primary">Assign Reviewer</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No full papers found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $fullpapers->links() }}
            </div>
        </div>
    </div>
@endsection
