@extends('layouts.app')

@section('title', 'New Conference Program')

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">New Conference Program</h4>
                <form action="{{ route('landing.conferance-program.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="start_time">Time Start</label>
                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" id="start_time" required>
                        @error('start_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_time">Time End</label>
                        <input type="time" class="form-control @error('time_end') is-invalid @enderror" name="end_time" id="end_time" required>
                        @error('end_time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="program_name">Program</label>
                        <input type="text" class="form-control @error('program_name') is-invalid @enderror" name="program_name" id="program_name" required>
                        @error('program_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="pic">PIC</label>
                        <input type="text" class="form-control @error('pic') is-invalid @enderror" name="pic" id="pic" >
                        @error('pic')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
