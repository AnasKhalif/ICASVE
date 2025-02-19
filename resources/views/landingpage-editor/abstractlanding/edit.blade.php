@extends('layouts.app')
@section('title', 'Edit Guideline')
@section('content')
<div class="container">
    <h2>Edit Guideline</h2>

    <form action="{{ route('landing.abstractlanding.update', $abstractLanding->id) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="guideline" id="guideline" class="form-control">{{ $abstractLanding->guideline }}</textarea>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
    

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('guideline');
    </script>
</div>
@endsection
