@extends('layouts.app')

@section('title', 'Edit Abstract')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Abstract</h4>
                <form class="forms-sample" action="{{ route('abstracts.update', $abstract->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title', $abstract->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="symposium_id">Symposium</label>
                        <select class="form-control" id="symposium_id" name="symposium_id" required>
                            <option value="">-- Select Symposium --</option>
                            @foreach ($symposiums as $symposium)
                                <option value="{{ $symposium->id }}"
                                    {{ old('symposium_id', $abstract->symposium_id) == $symposium->id ? 'selected' : '' }}>
                                    {{ $symposium->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Presentation Type</label>
                        <select class="form-control" name="presentation_type" required>
                            <option value="Oral presentation"
                                {{ old('presentation_type', $abstract->presentation_type) == 'Oral presentation' ? 'selected' : '' }}>
                                Oral Presentation</option>
                            <option value="Poster presentation"
                                {{ old('presentation_type', $abstract->presentation_type) == 'Poster presentation' ? 'selected' : '' }}>
                                Poster Presentation</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="authors">Authors</label>
                        <input type="text" class="form-control" id="authors" name="authors"
                            value="{{ old('authors', $abstract->authors) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="affiliations">Affiliations</label>
                        <textarea class="form-control" id="affiliations" name="affiliations" required>{{ old('affiliations', $abstract->affiliations) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="corresponding_email">Corresponding Email</label>
                        <input type="email" class="form-control" id="corresponding_email" name="corresponding_email"
                            value="{{ old('corresponding_email', $abstract->corresponding_email) }}" required>
                    </div>

                    <div class="form-group">
                        <label for="abstract">Abstract</label>
                        <textarea class="form-control" id="abstract" name="abstract" required>{{ old('abstract', $abstract->abstract) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('abstracts.index') }}" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
