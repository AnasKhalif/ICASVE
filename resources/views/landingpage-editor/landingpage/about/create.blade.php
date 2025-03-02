@extends('layouts.app')
@section('title', 'Add About')
@section('content')<div class="container">
        <h2>Add About</h2>
        
        <form action="{{ route('landing.abouts.store') }}" method="POST" enctype="multipart/form-data" >
             @csrf 
            <div
                class="mb-3"> <label class="form-label">Title</label> <input type="text" name="title" class="form-control"
                    required> </div>
            <div class="mb-3"> <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="5" required></textarea>
            </div>
            <div class="mb-3"> <label class="form-label">Image</label> 
                <input type="file" name="image" class="form-control" accept="image/*"> 
                <label class="form-label">Format : jpg, jpeg, png | Max Size : 2MB</label>
            </div> 
            
            <button type="submit" class="btn btn-success">Save</button>
        </form>
        
    </div>
@endsection
