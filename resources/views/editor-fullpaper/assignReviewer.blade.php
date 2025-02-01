@extends('layouts.app')

@section('title', 'Assign Reviewer for Full Paper')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Assign Reviewer for Full Paper: {{ $fullpaper->title }}</h4>
                <form action="{{ route('reviewer.editor-fullpaper.assignReviewer', $fullpaper->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="reviewer_id">Select Reviewer</label>
                        <select class="form-control" name="reviewer_id" id="reviewer_id" required>
                            <option value="">-- Select Reviewer --</option>
                            @foreach ($reviewers as $reviewer)
                                <option value="{{ $reviewer->id }}"
                                    {{ old('reviewer_id') == $reviewer->id ? 'selected' : '' }}>
                                    {{ $reviewer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-success">Assign Reviewer</button>
                    <a href="{{ route('reviewer.editor-fullpaper.index') }}" class="btn btn-sm btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
