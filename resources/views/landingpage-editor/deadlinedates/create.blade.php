@extends('layouts.app')
@section('title', 'Add Deadline')
@section('content')
<div class="container">
    <h2>Add New Deadline</h2>
    <a href="{{ route('landing.deadlines.index') }}" class="btn btn-secondary mb-3">Back</a>

    <form action="{{ route('landing.deadlines.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
