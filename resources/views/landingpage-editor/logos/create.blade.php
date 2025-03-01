@extends('layouts.app')

@section('title', 'Tambah Logo')

@section('content')
    <div class="container">
        <h2>Tambah Logo</h2>

        <form action="{{ route('landing.logos.store') }}" method="POST" enctype="multipart/form-data" id="logoForm">
            @csrf
            <div class="mb-3">
                <label class="form-label">Upload Gambar</label>
                <input type="file" name="image" class="form-control" id="imageInput" required accept=".jpg, .jpeg, .png">
                <small class="text-danger d-none" id="imageError">Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.</small>
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun</label>
                <input type="number" name="year" class="form-control" required id="yearInput">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary" id="submitBtn">Simpan</button>
                <a href="{{ route('landing.logos.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('imageInput');
            const imageError = document.getElementById('imageError');
            const submitBtn = document.getElementById('submitBtn');
            const yearInput = document.getElementById('yearInput');

            // Set tahun default ke tahun saat ini
            yearInput.value = new Date().getFullYear();

            imageInput.addEventListener('change', function () {
                const file = imageInput.files[0];
                if (file) {
                    const fileType = file.type;
                    if (!['image/jpeg', 'image/jpg', 'image/png'].includes(fileType)) {
                        imageError.classList.remove('d-none');
                        submitBtn.disabled = true;
                    } else {
                        imageError.classList.add('d-none');
                        submitBtn.disabled = false;
                    }
                }
            });
        });
    </script>
@endsection
