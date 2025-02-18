@extends('layouts.app')
@section('title', 'Venue')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Venue</h4>
                    <a href="{{ route('landing.venue.create')}}" class="btn btn-sm btn-success" >New Venue</a>
                </div>
                <p class="card-description">
                    List of Venue
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Venue Name</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($venues as $venue)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $venue->venue_name }}</td>
                                    <td>{{ $venue->address }}</td>
                                    <td>
                                        <a href="{{ route('landing.venue.edit', $venue->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('landing.venue.destroy', $venue->id)}} " method="POST"
                                            style="display: inline-block;">
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
