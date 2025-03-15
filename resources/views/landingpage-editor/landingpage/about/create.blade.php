@extends('layouts.app')

@section('title', 'Add About')

@section('content')
    <div class="container card p-4">
        <h2>Add About</h2>

        <form action="{{ route('landing.abouts.store') }}" method="POST" enctype="multipart/form-data" id="aboutForm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required minlength="5" maxlength="255" placeholder="Example: About Our Company">
            </div>
            <div class="mb-3">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required minlength="10" placeholder="Example: Our company was founded in 2020 with the vision to provide the best solutions..."></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Image</label>
                <input type="file" name="image" class="form-control" accept=".jpg, .jpeg, .png" id="imageInput" required>
                <small class="form-text text-muted">
                    Format: JPG, JPEG, PNG | Max Size: 2MB | **Minimum 600x400 px**
                </small>
                <small class="text-danger d-none" id="imageError">Invalid format or image size.</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Year</label>
                <input type="number" name="year" class="form-control" id="yearInput" required min="2024" max="{{ date('Y') }}" placeholder="Example: 2024">
                <small class="form-text text-muted">Year must be between 2024 and {{ date('Y') }}.</small>
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

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success" id="submitBtn">Save</button>
                <a href="{{ route('landing.abouts.index') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

    <style>
        /* Custom CSS to make placeholder text lighter */
        ::placeholder {
            color: #999; /* Light gray color */
            opacity: 1; /* Ensure full visibility */
        }

        /* For older browsers */
        :-ms-input-placeholder {
            color: #999;
        }

        ::-ms-input-placeholder {
            color: #999;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set default year
            const yearInput = document.getElementById('yearInput');
            yearInput.value = new Date().getFullYear();

            // Image validation
            const imageInput = document.getElementById('imageInput');
            const imageError = document.getElementById('imageError');
            const submitBtn = document.getElementById('submitBtn');

            imageInput.addEventListener('change', function () {
                const file = imageInput.files[0];
                if (file) {
                    const fileType = file.type;
                    const fileSize = file.size / 1024 / 1024; // Convert to MB

                    if (!['image/jpeg', 'image/jpg', 'image/png'].includes(fileType) || fileSize > 2) {
                        imageError.innerText = "Invalid format or image size exceeds 2MB.";
                        imageError.classList.remove('d-none');
                        submitBtn.disabled = true;
                    } else {
                        const img = new Image();
                        img.src = URL.createObjectURL(file);
                        img.onload = function () {
                            if (this.width < 600 || this.height < 400) {
                                imageError.innerText = "Minimum image size is 600x400 px.";
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