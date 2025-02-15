@extends('layouts.app')
@section('title', 'conferance program')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">conferance program</h4>
                    <a href="{{ route('landing.conferance-program.create')}}" class="btn btn-sm btn-success" >New conferance program</a>
                </div>
                <p class="card-description">
                    List of conferance program
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Time</th>
                                <th>Program</th>
                                <th>PIC</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $program->start_time }} - {{ $program->end_time }}</td>
                                    <td>{{ $program->program_name }}</td>
                                    <td>{{ $program->pic }}</td>
                                    <td>
                                        <a href="{{ route('landing.conferance-program.edit', $program->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('landing.conferance-program.destroy', $program->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
