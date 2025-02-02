@extends('layouts.app')

@section('title', 'Full Papers without Reviewer')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Full Papers Without Reviewer</h4>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Symposium</th>
                                <th class="text-center">Assign Reviewer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($fullpapers as $key => $fullpaper)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-wrap">{{ $fullpaper->title }}</td>
                                    <td>{{ $fullpaper->abstract->symposium->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('reviewer.editor.showAssignReviewer', $fullpaper->id) }}"
                                            class="btn btn-sm btn-primary">Assign Reviewer</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No full papers found</td>
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
