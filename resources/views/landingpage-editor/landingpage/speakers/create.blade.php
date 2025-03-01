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
                            <option value="invited_speaker">Invited Speaker</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" required minlength="3">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="institution">Institution</label>
                        <input type="text" class="form-control" name="institution" id="institution" required minlength="3">
                        @error('institution')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" id="country" required minlength="3">
                        @error('country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <input type="file" class="form-control" name="image" id="image" required accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <small class="text-muted">Only PNG, JPEG, JPG. Max 2MB</small>
                        @error('image')
                            <span class="text-danger d-block">{{ $message }}</span>
                        @enderror
                        <div class="mt-2">
                            <img id="previewImage" src="#" alt="Preview" class="img-thumbnail d-none" style="max-width: 150px;">
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('landing.speakers.index') }}" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileLabel = file ? file.name : "Choose file";
            
            // Validasi format file
            const allowedExtensions = ["image/png", "image/jpeg", "image/jpg"];
            if (file && !allowedExtensions.includes(file.type)) {
                alert("Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.");
                this.value = "";
                return;
            }

            // Preview gambar
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('previewImage');
                    preview.src = e.target.result;
                    preview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
