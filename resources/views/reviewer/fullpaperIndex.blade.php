@extends('layouts.app')

@section('title', 'Tugas Review Full Paper')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Full Papers Assigned to You</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">File</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fullPapers as $key => $fullPaper)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-wrap">{{ $fullPaper->abstract->title }}</td>
                                    <td>
                                        @if ($fullPaper->file_path)
                                            <a href="{{ asset('storage/' . $fullPaper->file_path) }}" target="_blank"><i
                                                    class="fa fa-download text-primary fa-3x mt-2"></i></a>
                                        @else
                                            <span class="text-muted">No file available</span>
                                        @endif
                                    </td>
                                    <td><span class="badge badge-info">{{ ucfirst($fullPaper->status) }}</span></td>
                                    <td class="text-center">
                                        <a href="{{ route('reviewer.review-fullpaper.showReviewForm', $fullPaper->id) }}"
                                            class="btn btn-sm btn-primary">Review</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No tasks assigned</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
