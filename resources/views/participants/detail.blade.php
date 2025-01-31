@extends('layouts.app')

@section('content')
<main class="col-lg-12 grid-margin stretch-card">
    <article class="card">
        <section class="card-body">
            <header>
                <p class="Card-title">Detail Participants</p> 
            </header>

            <section class="border rounded mb-4">
                <header class="Card-title bg-light py-3 px-3 mb-0">
                    <h5 class="mb-0">Personal Information</h5>
                </header>
                <div class="px-3 py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Name:</strong> {{ $user->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Institution:</strong> {{ $user->institution }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Email:</strong> {{ $user->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Phone:</strong> {{ $user->phone_number }}</p>
                        </div>
                    
                        <div class="col-md-6">
                            <p><strong>Role:</strong>  
                                @foreach ($user->roles as $role)
                                {{ $role->display_name }}
                            @endforeach
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Attendance:</strong> <span class="text-success">{{ $user->attendance }}</span></p>
                        </div>
                        
                    </div>
                </div>
            </section>

            <section class="border rounded">
                <header class="Card-title bg-light py-3 px-3 mb-0">
                    <h5 class="mb-0">File</h5>
                </header>
                <div class="px-3 py-3">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Abstract</strong></p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Abstract</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Decision</strong></p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Decision</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>LETTER OF ACCEPTANCE</strong></p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View LETTER OF ACCEPTANCE</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Paper</strong></p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Paper</a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="mb-1"><strong>Payment</strong></p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Payment</a>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </article>
</main>
@endsection