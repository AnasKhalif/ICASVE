@extends('layouts.app')
@section('title', 'Edit Gallery')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Gallery</h4>
                <form action="{{ route('landing.gallery.update', $gallery->id) }}" class="forms-sample" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="mb-2">
                            @if ($gallery->image)
                                <img src="{{ asset('storage/' . $gallery->image) }}" alt="Current Image"
                                    style="max-width: 150px; display: block;">
                            @endif
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_path" id="image_path">
                                <label class="custom-file-label" for="image_path" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="from-group">
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <input type="year" name="year" class="form-control" value="{{ $gallery->year }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <script>
                document.getElementById('image_path').addEventListener('change', function() {
                    var fileName = this.files[0] ? this.files[0].name : 'Choose file';
                    document.getElementById('fileLabel').innerText = fileName;
                });
            </script>
        </div>
    </div>
@endsection
