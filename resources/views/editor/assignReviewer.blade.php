@extends('layouts.app')

@section('title', 'Assign Reviewer')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Assign Reviewer for Abstract: {{ $abstract->title }}</h4>
                {{-- <form action="{{ route('reviewer.editor.assignReviewer', $abstract->id) }}" method="POST">
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
                    <a href="{{ route('reviewer.editor.index') }}" class="btn btn-sm btn-light">Cancel</a>
                </form> --}}
                <form action="{{ route('reviewer.editor.assignReviewer', $abstract->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="reviewer_1_id">Select Reviewer 1</label>
                        <select class="form-control" name="reviewer_1_id" id="reviewer_1_id" required>
                            <option value="">-- Select Reviewer 1 --</option>
                            @foreach ($reviewers as $reviewer)
                                <option value="{{ $reviewer->id }}"
                                    {{ old('reviewer_1_id') == $reviewer->id ? 'selected' : '' }}>
                                    {{ $reviewer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="reviewer_2_id">Select Reviewer 2</label>
                        <select class="form-control" name="reviewer_2_id" id="reviewer_2_id" required>
                            <option value="">-- Select Reviewer 2 --</option>
                            @foreach ($reviewers as $reviewer)
                                <option value="{{ $reviewer->id }}"
                                    {{ old('reviewer_2_id') == $reviewer->id ? 'selected' : '' }}>
                                    {{ $reviewer->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success">Assign Reviewers</button>
                    <a href="{{ route('reviewer.editor.index') }}" class="btn btn-sm btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
