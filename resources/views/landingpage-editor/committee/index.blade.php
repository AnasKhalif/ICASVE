@extends('layouts.app')
@section('title', 'Committee')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Edit Committee</h4>
                </div>
                <div class="table-responsive pt-3 d-flex justify-content-around">
                   
                    <a href="{{ route('landing.steering.index') }}" class="btn btn-md btn-danger">Steering Commitee</a>
                    <a href="{{ route('landing.reviewer-committee.index') }}" class="btn btn-md btn-danger">Reviewer Committee</a>
                    <a href="{{ route('landing.organizing.index') }}" class="btn btn-md btn-danger">Organizing Committee</a>
                </div>
            </div>
        </div>
    </div>
@endsection
