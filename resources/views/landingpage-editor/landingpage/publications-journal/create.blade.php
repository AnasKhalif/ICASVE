@extends('layouts.app')
@section('title', 'New Publications Journal')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">ADD Publications Journal</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.publications-journal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image_type">Image Type</label>
                        <select name="image_type" id="image_type" class="form-control" required>
                            <option value="" disabled selected>-- Select Image Type --</option>
                            <option value="publications_journal">Publications Journal</option>
                            <option value="hosted_by">Hosted By</option>
                            <option value="co_hosted_by">Co-Hosted By</option>
                            <option value="supported_by">Supported By</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image_path">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_path" id="image_path" required accept=".png, .jpg, .jpeg">
                                <label class="custom-file-label" for="image_path" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">
                            Format: JPG, JPEG, PNG | Max Size: 2MB 
                        </small>
                        <small class="text-danger d-none" id="fileError">Format file tidak didukung. Harap unggah gambar dengan format PNG, JPEG, atau JPG.</small>
                        <div class="mt-3">
                            <img id="previewImage" src="" class="d-none" width="100">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('landing.publications-journal.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image_path').addEventListener('change', function() {
            var file = this.files[0];
            var fileLabel = document.getElementById('fileLabel');
            var fileError = document.getElementById('fileError');
            var previewImage = document.getElementById('previewImage');

            if (file) {
                var fileName = file.name;
                fileLabel.innerText = fileName;

                // Validasi format file
                var validExtensions = ['image/jpeg', 'image/png', 'image/jpg'];
                if (!validExtensions.includes(file.type)) {
                    fileError.classList.remove('d-none');
                    this.value = "";
                    fileLabel.innerText = "Choose file";
                    previewImage.classList.add('d-none');
                } else {
                    fileError.classList.add('d-none');

                    // Preview gambar
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.classList.remove('d-none');
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>
@endsection
