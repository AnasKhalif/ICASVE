@extends('layouts.app')
@section('title', 'New Venue')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Venue</h4>
                <form action="{{ route('landing.venue.update', $venue->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="venue_name">Venue Name</label>
                        <input type="text" class="form-control" name="venue_name" id="venue_name"
                            value="{{ old('venue_name', $venue->venue_name) }}" required>
                        @error('venue_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address"
                            value="{{ old('address', $venue->address) }}" required>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="string" class="form-control" name="date" id="date"
                            value="{{ old('date', $venue->date) }}" required>
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="link_map">Link Map</label>
                        <input type="text" class="form-control" name="link_map" id="link_map"
                            value="{{ old('link_map', $venue->link_map) }}" required>
                        @error('link_map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="map">Frame Map</label>
                        <input type="text" class="form-control" name="map" id="map"
                            value="{{ old('map', $venue->map) }}" required>
                        @error('map')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image_path">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_path" id="image_path">
                                <label class="custom-file-label" for="image_path" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                        @error('image_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
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
