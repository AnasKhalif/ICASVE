@extends('layouts.app')

@section('title', 'Edit Status Abstract')

@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col">
                <div class="card text-center">
                    <div class="card-body">
                        <h4 id="abstract_title" class="card-title">{{ $abstract->title }}</h4>
                        <p id="abstract_abstract"><strong>Abstract</strong></p>
                        <div id="abstract_body">
                            {!! nl2br(e($abstract->abstract)) !!}
                        </div>

                        <hr>

                        <p id="abstract_symposium"><strong>Symposium:</strong> {{ $abstract->symposium->name }}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Status for Abstract: {{ $abstract->title }}</h4>
                <form action="{{ route('reviewer.editor.updateStatus', $abstract->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="status">Choose Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="open" {{ $abstract->status == 'open' ? 'selected' : '' }}>Open</option>
                            <option value="under review" {{ $abstract->status == 'under review' ? 'selected' : '' }}>Under
                                Review</option>
                            <option value="accepted" {{ $abstract->status == 'accepted' ? 'selected' : '' }}>Accepted
                            </option>
                            <option value="rejected" {{ $abstract->status == 'rejected' ? 'selected' : '' }}>Rejected
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
