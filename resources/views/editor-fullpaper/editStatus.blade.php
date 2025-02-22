@extends('layouts.app')

@section('title', 'Edit Status Full Paper')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Status for Full Paper: {{ $fullpaper->title }}</h4>
                <form action="{{ route('reviewer.editor-fullpaper.updateStatus', $fullpaper->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status">Choose Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="open" {{ $fullpaper->status == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="under review" {{ $fullpaper->status == 'under review' ? 'selected' : '' }}>Under
                                Review</option>
                            <option value="accepted" {{ $fullpaper->status == 'accepted' ? 'selected' : '' }}>Accepted
                            </option>
                            <option value="revision" {{ $fullpaper->status == 'revision' ? 'selected' : '' }}>Revision
                            </option>
                            <option value="rejected" {{ $fullpaper->status == 'rejected' ? 'selected' : '' }}>Rejected
                            </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Update Status</button>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
