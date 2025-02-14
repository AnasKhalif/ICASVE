@extends('layouts.app')

@section('title', 'Active Year')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Active Year Management</h4>

                <form action="{{ route('admin.years.store') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="input-group">
                        <input type="number" name="year" class="form-control" required placeholder="Enter year">
                        <button type="submit" class="btn btn-primary">Add Year</button>
                    </div>
                </form>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Year</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($years as $year)
                            <tr>
                                <td>{{ $year->year }}</td>
                                <td>
                                    @if ($year->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if (!$year->is_active)
                                        <form action="{{ route('admin.years.setActive', $year->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning">Set as Active</button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-success" disabled>Active</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
