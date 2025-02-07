@extends('layouts.app')

@section('title', 'Certificates')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Certificates</h4>
                <p class="card-description">List of certificates</p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Certificate Type</th>
                                <th>Payment Status</th>
                                <th>File</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($certificates as $key => $certificate)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $certificate->user->name }}</td>
                                    <td>{{ $certificate->certificate_type }}</td>
                                    <td>
                                        @if ($certificate->user->filePayment)
                                            @if ($certificate->user->filePayment->status === 'pending')
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif ($certificate->user->filePayment->status === 'verified')
                                                <span class="badge badge-success">Verified</span>
                                            @else
                                                <span class="badge badge-danger">not yet paid</span>
                                            @endif
                                        @else
                                            <span class="badge badge-danger">not yet paid</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ asset('storage/' . $certificate->certificate_path) }}" target="_blank"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-file"></i> View
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.certificates.toggle', $certificate->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="1" {{ $certificate->status ? 'selected' : '' }}>Aktif
                                                </option>
                                                <option value="0" {{ !$certificate->status ? 'selected' : '' }}>Non
                                                    Aktif</option>
                                            </select>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $certificates->links() }}
            </div>
        </div>
    </div>
@endsection
