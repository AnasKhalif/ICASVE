@extends('layouts.app')

@section('title', 'Payment Verification')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Table of Payment</h4>

                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Name / Institution / Email</th>
                                <th>Registration Type</th>
                                <th>Proof</th>
                                <th>Receipt</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $payment->user->name }}</strong><br>
                                        {{ $payment->user->institution }}<br>
                                        {{ $payment->user->email }}
                                    </td>
                                    <td>
                                        {{ $payment->user->roles->first()->name }}
                                    </td>
                                    <td>
                                        @if ($payment->file_path)
                                            <a href="{{ asset('storage/' . $payment->file_path) }}" target="_blank"
                                                class="d-flex justify-content-center"><i class="fa fa-file fa-lg"></i></a>
                                        @else
                                            No proof available
                                        @endif
                                    </td>
                                    <td><a href="{{ route('admin.payment.digitalPdf', $payment->id) }}" target="_blank"
                                            class="btn btn-primary">
                                            Open Digital PDF
                                        </a></td>
                                    <td>IDR {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $payment->status == 'verified' ? 'bg-success' : 'bg-warning' }}">
                                            {{ ucfirst($payment->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.payment.verify', $payment->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="btn btn-sm {{ $payment->status == 'verified' ? 'btn-warning' : 'btn-success' }}">
                                                {{ $payment->status == 'verified' ? 'Revert to Pending' : 'Verify Payment' }}
                                            </button>
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
