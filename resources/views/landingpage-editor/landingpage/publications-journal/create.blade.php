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
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_path" id="image_path" required>
                                <label class="custom-file-label" for="image_path" id="fileLabel">Choose file</label>

                            </div>
                        </div>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('landing.publications-journal.index') }}" class="btn btn-secondary">Back</a>
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