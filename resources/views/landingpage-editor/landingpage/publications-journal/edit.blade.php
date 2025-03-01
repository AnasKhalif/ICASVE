@extends('layouts.app')
@section('title', 'Edit Publications Journal')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold text-uppercase">EDIT Publications Journal</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.publications-journal.update', $publications_journal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="mb-3">
                        <label for="image_type">Image Type</label>
                        <select name="image_type" id="image_type" class="form-control" required>
                            <option value="" disabled selected>-- Select Image Type --</option>
                            <option value="publications_journal" {{ old('image_type', $publications_journal->image_type) == 'publications_journal' ? 'selected' : '' }}>Publications Journal</option>
                            <option value="hosted_by" {{ old('image_type', $publications_journal->image_type) == 'hosted_by' ? 'selected' : '' }}>Hosted By</option>
                            <option value="co_hosted_by" {{ old('image_type', $publications_journal->image_type) == 'co_hosted_by' ? 'selected' : '' }}>Co-Hosted By</option>
                            <option value="supported_by" {{ old('image_type', $publications_journal->image_type) == 'supported_by' ? 'selected' : '' }}>Supported By</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_path" id="image_path" accept=".png,.jpg,.jpeg">
                                <label class="custom-file-label" for="image_path" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                        @error('image_path')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mt-3">
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/' . $publications_journal->image_path) }}" alt="Image" width="100">
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
