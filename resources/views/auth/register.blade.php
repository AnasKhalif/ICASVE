@extends('auth.main')

@section('title')
    Register
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
                            <h4 class="mb-2">REGISTRATION FORM</h4>
                            <div class="w-80 px-md-2" style="height: 2px; background: gray"></div>
                            <div class="px-md-2 mt-3">
                                <div class="d-flex align-items-start mb-3">
                                    <img src="{{ asset('img/check_icon.svg') }}" alt="Check icon" class="me-2" />
                                    <p class="mb-0">All attendees must complete the registration process.</p>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <img src="{{ asset('img/check_icon.svg') }}" alt="Check icon" class="me-2" />
                                    <div class="d-flex flex-column">
                                        <p class="mb-1">One attendee should register only <strong>ONCE</strong>. If the
                                            committee allows,one attendee can submit multiple abstracts using this system.
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-start mb-3">
                                    <img src="{{ asset('img/check_icon.svg') }}" alt="check icon" class="me-2" />
                                    <p class="mb-0">Do not use your name and email to register other attendees.</p>
                                </div>
                            </div>
                            <form class="px-md-2" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="E.g. Budi Utomo" value="{{ old('name') }}" required />
                                    @if ($errors->has('name'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('name') }}</span>
                                    @endif
                                    <p style="font-size: 12px">
                                        This will be used to print your <span class="fw-bold">certificate</span>, so make
                                        sure that the spelling is correct. If you want your academic title to be printed on
                                        the certificate, please input the degree along with
                                        your name (e.g. Budi Utomo, Ph.D).
                                    </p>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="email">Email address</label>
                                    <input type="text" name="email" id="email" class="form-control"
                                        placeholder="E.g. budiutomo@gmail.com" value="{{ old('email') }}" required />
                                    @if ($errors->has('email'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('email') }}</span>
                                    @endif
                                    <p style="font-size: 12px">The committee will use this email as the primary way to
                                        communicate with you, so make sure that the email is actively used.</p>
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        placeholder="Enter your password" required />
                                    @if ($errors->has('password'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('password') }}</span>
                                    @endif
                                    <p style="font-size: 12px">Password must contain at least 8 characters and include a mix
                                        of letters, numbers, and symbols.</p>
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control" placeholder="Re-enter your password" required />
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="institution">Institution</label>
                                    <input type="text" name="institution" id="institution" class="form-control"
                                        placeholder="E.g. Faculty of Science, Brawijaya University"
                                        value="{{ old('institution') }}" required />
                                    @if ($errors->has('institution'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('institution') }}</span>
                                    @endif
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="job_title">Job Title</label>
                                    <input type="text" id="job_title" name="job_title" class="form-control"
                                        placeholder="E.g. Professor, PhD, Student, etc." value="{{ old('job_title') }}"
                                        required />
                                    @if ($errors->has('job_title'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('job_title') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="phone_number">Phone Number</label>
                                    <input type="text" id="phone_number" name="phone_number" class="form-control"
                                        placeholder="Enter your phone number" value="{{ old('phone_number') }}"
                                        required />
                                    @if ($errors->has('phone_number'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="registration_type">Registration Type</label>
                                    <select name="role_id" id="registration_type" class="form-select" required>
                                        <option value="" disabled {{ old('role_id') ? '' : 'selected' }}>Choose type
                                        </option>
                                        @foreach ($role as $r)
                                            <option value="{{ $r->id }}"
                                                {{ old('role_id') == $r->id ? 'selected' : '' }}>{{ $r->display_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('role_id'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('role_id') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="attendance">Attendance Plan</label>
                                    <select name="attendance" id="attendance" class="form-select" required>
                                        <option value="" disabled {{ old('attendance') ? '' : 'selected' }}>Choose
                                        </option>
                                        <option value="onsite" {{ old('attendance') == 'onsite' ? 'selected' : '' }}>
                                            Onsite</option>
                                        <option value="online" {{ old('attendance') == 'online' ? 'selected' : '' }}>
                                            Online</option>
                                    </select>
                                    @if ($errors->has('attendance'))
                                        <span class="text-danger"
                                            style="font-size: 12px">{{ $errors->first('attendance') }}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success btn-lg mb-1">Proceed</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
