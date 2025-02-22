@extends('layouts.app')
@section('title', 'Edit Deadline')
@section('content')
<div class="container">
    <h2>Edit Deadline</h2>
    <a href="{{ route('landing.deadlines.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('landing.deadlines.update', $deadline->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $deadline->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $deadline->date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
