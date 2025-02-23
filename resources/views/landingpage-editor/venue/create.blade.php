@extends('layouts.app')
@section('title', 'New Venue')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Venue</h4>
                <form action="{{ route('landing.venue.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="venue_name">Venue Name</label>
                        <input type="text" class="form-control" name="venue_name" id="venue_name" required>
                        @error('venue_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" required>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="date">Date</label>
                        <input type="string" class="form-control" name="date" id="date" required>
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="link_map">Link Map</label>
                        <input type="text" class="form-control" name="link_map" id="link_map" required>
                        @error('link_map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="map">Frame Map</label>
                        <input type="text" class="form-control" name="map" id="map" required>
                        @error('map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image_path">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_path" id="image_path" required>
                                <label class="custom-file-label" for="image_path" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                        @error('image_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Preview Image -->
                    <div class="form-group mb-3">
                        <label class="form-label">Image Preview</label>
                        <div>
                            <img id="previewImg" src="" alt="Image Preview" style="max-width: 300px; display: none; border: 1px solid #ddd; padding: 5px;">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
            <script>
                document.getElementById('image_path').addEventListener('change', function() {
                    var fileInput = this;
                    var fileName = fileInput.files[0] ? fileInput.files[0].name : 'Choose file';
                    document.getElementById('fileLabel').innerText = fileName;

                    // Preview the image
                    if (fileInput.files && fileInput.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var preview = document.getElementById('previewImg');
                            preview.src = e.target.result;
                            preview.style.display = 'block';
                        }
                        reader.readAsDataURL(fileInput.files[0]);
                    }
                });
            </script>
        </div>
    </div>
@endsection
