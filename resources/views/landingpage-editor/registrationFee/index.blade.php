@extends('layouts.app')
@section('title', 'Registration Fee')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold text-uppercase">Registration Fee</h2>
        <hr class="border border-success">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('landing.registrationFee.create') }}" class="btn btn-primary">Add Registration Fee</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-success">
                <tr>
                    <th>No</th>
                    <th>category name</th>
                    <th>Role</th>
                    <th>domestic_participants</th>
                    <th>international_participants</th>
                    <th>period of payment</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrationFees as $registrationfee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                                    <td>{{ $registrationfee->category_name }}</td>
                                    <td>{{ $registrationfee->role_type }}</td>
                                    <td>{{ $registrationfee->domestic_participants  }}</td>
                                    <td>{{ $registrationfee->international_participants }} </td>
                                    <td>{{ $registrationfee->period_of_payment }} </td>
                        <td>
                            <a href="{{ route('landing.registrationFee.edit', $registrationfee->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('landing.registrationFee.destroy', $registrationfee->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
