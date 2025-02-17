@extends('layouts.app')
@section('title', 'Speaker')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Registration Fee</h4>
                    <a href="{{ route('landing.registrationFee.create')}}" class="btn btn-sm btn-success" >New Registration Fee</a>
                </div>
                <p class="card-description">
                    List of Registration Fee
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
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
                                    <td>{{$registrationfee->category_name ?? 'TBA'}}</td>
                                    <td>{{$registrationfee->role_type ?? 'TBA'}}</td>
                                    <td>{{$registrationfee->domestic_participants ?? 'TBA'}}</td>
                                    <td>{{$registrationfee->international_participants ?? 'TBA'}} </td>
                                    <td>{{$registrationfee->period_of_payment ?? 'TBA'}} </td>
                                    <td>
                                        <a href="{{ route('landing.registrationFee.edit', $registrationfee->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('landing.registrationFee.destroy', $registrationfee->id) }}" method="POST"
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
