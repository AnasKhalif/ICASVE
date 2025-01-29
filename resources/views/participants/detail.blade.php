@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Participants</h4>
                <p class="card-description">
                    List of participants with roles
                </p>
                // GAWE NDE KENE LAM
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
