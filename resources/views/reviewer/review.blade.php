@extends('layouts.app')

@section('title', 'Review Abstract')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Review Abstract: {{ $abstract->title }}</h4>
                <form action="{{ route('reviewer.review.storeReview', $abstract->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="recommendation">Recommendation</label>
                        <select class="form-control" name="recommendation" id="recommendation" required>
                            <option value="Oral"
                                {{ old('recommendation', $abstractReview->recommendation ?? '') == 'Oral' ? 'selected' : '' }}>
                                Oral</option>
                            <option value="Poster"
                                {{ old('recommendation', $abstractReview->recommendation ?? '') == 'Poster' ? 'selected' : '' }}>
                                Poster</option>
                            <option value="Reject"
                                {{ old('recommendation', $abstractReview->recommendation ?? '') == 'Reject' ? 'selected' : '' }}>
                                Reject</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="5">{{ old('comment', $abstractReview->comment ?? '') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success">Submit Review</button>
                    <a href="{{ route('reviewer.review.index') }}" class="btn btn-sm btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
