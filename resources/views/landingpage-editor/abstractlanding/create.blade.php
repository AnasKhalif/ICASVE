@extends('layouts.app')
@section('title', 'Tambah Guideline')
@section('content')
<div class="container">
    <h2>Tambah Guideline</h2>

    <form action="{{ route('landing.abstractlanding.store') }}" method="POST">
        @csrf
        <textarea name="guideline" id="guideline" class="form-control"></textarea>
        <button type="submit" class="btn btn-primary mt-2">Simpan</button>
    </form>

    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('guideline');
    </script>
</div>
@endsection
