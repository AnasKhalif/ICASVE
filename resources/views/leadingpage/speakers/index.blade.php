@extends('layouts.app')

@section('title', 'Participants')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">Speakers</h4>
                <a href="{{ route('admin.speakers.create') }}" class="btn btn-sm btn-success">New Speaker</a>
            </div>
            <p class="card-description">
                List of speakers
            </p>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>institution</th>
                            <th>role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>  
                        @foreach ( $speakers as $speaker)
                        <tr>
                            <td>{{ $speaker->id }}</td>
                            <td>{{ $speaker->name }}</td>
                            <td>{{ $speaker->institution }}</td>
                            <td> {{ str_replace('_', ' ', $speaker->role) }} </td>
                            <td>
                                <a href="{{ route('admin.speakers.edit', $speaker->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.speakers.destroy', $speaker->id) }}" method="POST"
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
