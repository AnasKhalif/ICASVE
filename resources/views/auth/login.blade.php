@extends('auth.main')

@section('title')
    Login
@endsection

@section('content')
    <section class="h-100 h-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3 shadow">
                        <img src="{{ asset('img/icasve_logo.jpg') }}" class="w-100"
                            style="border-top-left-radius: 0.3rem; border-top-right-radius: 0.3rem"
                            alt="Sample registration form photo" />
                        <div class="card-body p-4 p-md-5">
                            <h3 class="px-md-2 mb-2">Login</h3>
                            <div class="w-80 px-md-2 mb-3 mb-md-4" style="height: 2px; background: gray"></div>
                            <div class="d-flex align-items-start mb-3 px-md-2">
                                <img src="./img/check_icon.svg" alt="Check icon" class="me-2" />
                                <p class="mb-0">All attendees must complete the registration process.</p>
                            </div>
                            <form class="px-md-2" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="E.g. budiutomo@gmail.com" value="{{ old('email') }}" required />
                                    @if ($errors->has('email'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required />
                                    @if ($errors->has('password'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-success btn-lg mb-1">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
