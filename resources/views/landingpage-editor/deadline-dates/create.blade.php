@extends('layouts.app')
@section('title', 'Add Deadline')

@section('content')
<div class="container">
    <h2 class="my-4">Add New Deadline</h2>

    <form action="{{ route('landing.deadline-dates.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('landing.deadline-dates.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
