@extends('layouts.app')
@section('title', 'New Publications Journal')
@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Publications Journal</h4>
                <form action="{{ route('landing.publications-journal.update', $publications_journal->id) }}" class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image_type">Image Type</label>
                        <select name="image_type" id="image_type" class="form-control" required>
                            <option value="" disabled selected>-- Select Image Type --</option>
                            <option value="publications_journal" {{ old('image_type', $publications_journal->image_type) == 'publications_journal' ? 'selected' : '' }}>Publications Journal</option>
                            <option value="hosted_by" {{ old('image_type', $publications_journal->image_type) == 'hosted_by' ? 'selected' : '' }}>Hosted By</option>
                            <option value="co_hosted_by" {{ old('image_type', $publications_journal->image_type) == 'co_hosted_by' ? 'selected' : '' }}>Co-Hosted By</option>
                            <option value="supported_by" {{ old('image_type', $publications_journal->image_type) == 'supported_by' ? 'selected' : '' }}>Supported By</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image_path" id="image_path">
                                <label class="custom-file-label" for="image_path" id="fileLabel">Choose file</label>
                            </div>
                        </div>
                        <img src="{{ asset('storage/' . $publications_journal->image_path) }}" alt="Image" width="100" style="margin-top: 15px">
                    </div>
                   
                   
                    <button type="submit" class="btn btn-success">Submit</button>
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
