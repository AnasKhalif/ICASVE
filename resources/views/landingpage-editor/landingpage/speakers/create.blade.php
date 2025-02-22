@extends('layouts.app')
@section('title', 'New Speaker')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">ADD Speaker</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.speakers.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="" disabled selected>-- Select Role --</option>
                            <option value="keynote_speaker">Keynote Speaker</option>
                            <option value="invited_speaker">Invited Speakers</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="institution">Institution</label>
                        <input type="text" class="form-control" name="institution" id="institution" required>
                        @error('institution')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" id="country" required>
                        @error('country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image" required>
                                <label class="custom-file-label" for="image" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
            
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('landing.speakers.index') }}" class="btn btn-secondary">Back</a>
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
