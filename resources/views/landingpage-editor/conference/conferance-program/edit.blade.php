@extends('layouts.app')
@section('title', 'Edit Contact')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">Edit Conference Program</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.conferance-program.update', $program->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="start_time">Time Start</label>
                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time"
                            id="start_time" value="{{ $program->start_time }}" required>
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="end_time">Time End</label>
                        <input type="time" class="form-control @error('time_end') is-invalid @enderror" name="end_time"
                            id="end_time" value="{{ $program->end_time }}" required>
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="program_name">Program</label>
                        <input type="text" class="form-control @error('program_name') is-invalid @enderror"
                            name="program_name" id="program_name" value="{{ $program->program_name }}" required>
                        @error('program_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pic">PIC</label>
                        <input type="text" class="form-control @error('pic') is-invalid @enderror" name="pic"
                            id="pic" value="{{ $program->pic }}" >
                        @error('pic')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('landing.conferance-program.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
