@extends('layouts.app')

@section('title', 'Add About')

@section('content')
    <div class="container">
        <h2>Add About</h2>

        <form action="{{ route('landing.abouts.store') }}" method="POST" enctype="multipart/form-data" id="aboutForm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required minlength="5" maxlength="255">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required minlength="10"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png" id="imageInput" required>
                <small class="form-text text-muted">
                    Format: JPG, JPEG, PNG | Max Size: 2MB | **Minimal 600x400 px**
                </small>
                <small class="text-danger d-none" id="imageError">Format atau ukuran gambar tidak sesuai.</small>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-success" id="submitBtn">Save</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('imageInput');
            const imageError = document.getElementById('imageError');
            const submitBtn = document.getElementById('submitBtn');

            imageInput.addEventListener('change', function () {
                const file = imageInput.files[0];
                if (file) {
                    const fileType = file.type;
                    const fileSize = file.size / 1024 / 1024; // Convert to MB

                    if (!['image/jpeg', 'image/jpg', 'image/png'].includes(fileType) || fileSize > 2) {
                        imageError.innerText = "Format tidak valid atau ukuran lebih dari 2MB.";
                        imageError.classList.remove('d-none');
                        submitBtn.disabled = true;
                    } else {
                        const img = new Image();
                        img.src = URL.createObjectURL(file);
                        img.onload = function () {
                            if (this.width < 600 || this.height < 400) {
                                imageError.innerText = "Ukuran gambar minimal 600x400 px.";
                                imageError.classList.remove('d-none');
                                submitBtn.disabled = true;
                            } else {
                                imageError.classList.add('d-none');
                                submitBtn.disabled = false;
                            }
                        };
                    }
                }
            });
        });
    </script>
@endsection
