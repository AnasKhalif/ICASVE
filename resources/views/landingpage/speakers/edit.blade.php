@extends('layouts.app')
@section('title', 'Edit Speaker')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Speaker</h4>
                <form action="{{ route('landing.speakers.update', $speaker->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ old('name', $speaker->name) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="institution">Institution</label>
                        <input type="text" class="form-control" name="institution" id="institution"
                            value="{{ old('institution', $speaker->institution) }}" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="keynote_speaker" {{ $speaker->role == 'keynote_speaker' ? 'selected' : '' }}>
                                Keynote Speaker</option>
                            <option value="invited_speaker" {{ $speaker->role == 'invited_speaker' ? 'selected' : '' }}>
                                Invited Speaker</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="mb-2">
                            @if ($speaker->image)
                                <img src="{{ asset('storage/' . $speaker->image) }}" alt="Current Image"
                                    style="max-width: 150px; display: block;">
                            @endif
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <script>
                document.getElementById('image').addEventListener('change', function() {
                    var fileName = this.files[0] ? this.files[0].name : 'Choose file';
                    document.getElementById('fileLabel').innerText = fileName;
                });
            </script>
        </div>
    </div>
@endsection
