@extends('layouts.app')

@section('title', 'Abstracts')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.download.fullpaper') }}" class="btn btn-primary">
                    <i class="fas fa-download"></i> Download All Verified Full Papers
                </a>

                <a href="{{ route('admin.download.paymentProof') }}" class="btn btn-success">
                    <i class="fas fa-download"></i> Download All Verified Payment Proofs
                </a>

            </div>
        </div>
    </div>
@endsection
