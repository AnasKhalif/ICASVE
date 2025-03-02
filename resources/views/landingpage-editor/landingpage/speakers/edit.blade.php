@extends('layouts.app')
@section('title', 'Edit Speaker')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Edit Speaker</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.speakers.update', $speaker->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <div class="mb-3">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="keynote_speaker" {{ $speaker->role == 'keynote_speaker' ? 'selected' : '' }}>
                                Keynote Speaker</option>
                            <option value="invited_speaker" {{ $speaker->role == 'invited_speaker' ? 'selected' : '' }}>
                                Invited Speaker</option>
                        </select>
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" 
                               value="{{ old('name', $speaker->name) }}" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="institution">Institution</label>
                        <input type="text" class="form-control" name="institution" id="institution" 
                               value="{{ old('institution', $speaker->institution) }}" required>
                        @error('institution')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" name="country" id="country" 
                               value="{{ old('country', $speaker->country) }}" required>
                        @error('country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image">Image</label>
                        <div class="mb-2">
                            @if ($speaker->image)
                                <img src="{{ asset('storage/' . $speaker->image) }}" alt="Current Image"
                                     style="max-width: 150px; display: block;">
                            @endif
                        </div>
                        <div class="input-group">
                            <input type="file" class="form-control" name="image" id="image" 
                                   accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <small class="text-muted">Only PNG, JPEG, JPG. Max size: 2MB. Required dimensions: 300x300 px</small>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mt-2">
                            <img id="previewImage" src="#" alt="Preview" class="img-thumbnail d-none" style="max-width: 150px;">
                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>

            <script>
                document.getElementById('image').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const maxSize = 2 * 1024 * 1024; // 2MB
                    const allowedExtensions = ["image/png", "image/jpeg", "image/jpg"];

                    if (file) {
                        // Validasi format file
                        if (!allowedExtensions.includes(file.type)) {
                            alert("Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.");
                            this.value = "";
                            return;
                        }

                        // Validasi ukuran file
                        if (file.size > maxSize) {
                            alert("Ukuran file terlalu besar! Maksimal 2MB.");
                            this.value = "";
                            return;
                        }

                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = new Image();
                            img.src = e.target.result;
                            img.onload = function() {
                                // Validasi dimensi gambar (harus 300x300 px)
                                if (img.width !== 300 || img.height !== 300) {
                                    alert("Ukuran gambar harus 300x300 piksel!");
                                    document.getElementById('image').value = "";
                                    return;
                                }

                                // Tampilkan preview jika valid
                                const preview = document.getElementById('previewImage');
                                preview.src = e.target.result;
                                preview.classList.remove('d-none');
                            };
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>
        </div>
    </div>
@endsection
