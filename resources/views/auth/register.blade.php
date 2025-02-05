@extends('auth.main')

@section('title')
    Register
@endsection

@section('content')
   <main class="container-fluid vh-100 p-0">
       <div class="row m-0 h-100">
           <section class="col-lg-6 d-flex align-items-center p-5 vh-100 position-relative overflow-hidden" 
               style="background: linear-gradient(45deg, #1B5E20, #2E7D32, #388E3C);">
               
               <div class="position-absolute w-100 h-100" style="top: 0; left: 0; z-index: 1;">
                   <svg viewBox="0 0 100 100" preserveAspectRatio="none" style="width: 100%; height: 100%; opacity: 0.1;">
                       <defs>
                           <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                               <stop offset="0%" style="stop-color:white;stop-opacity:0.2" />
                               <stop offset="100%" style="stop-color:white;stop-opacity:0" />
                           </linearGradient>
                       </defs>
                       <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="url(#grad)">
                           <animate attributeName="d" 
                               dur="20s" 
                               repeatCount="indefinite"
                               values="M0,0 L100,0 L100,100 L0,100 Z;
                                       M0,50 L50,0 L100,50 L50,100 Z;
                                       M0,0 L100,0 L100,100 L0,100 Z"/>
                       </path>
                   </svg>
               </div>

               <div class="banner-content text-white position-relative" style="z-index: 2;">
                   <div class="d-flex align-items-center mb-4">
                       <img src="{{ asset('img/Logo_ICASVE_rmbg.png') }}" alt="Logo icasve" class="img-fluid" style="max-width: 180px;">
                   </div>
                   <div class="px-4">    
                       <h1 class="mb-4 display-4 font-weight-bold" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">
                          Daftar karepmu ga daftat karepmu
                       </h1>
                       <p class="text-warning mt-3 d-flex align-items-center">
                           <i class="fas fa-info-circle mr-2"></i>
                           *info selengkapnya di 
                       </p>
                   </div>
               </div>
           </section>
           
           <section class="col-lg-6 d-flex align-items-center justify-content-center p-4 vh-100" 
               style="background: #F1F8E9;">
               <div class="login-container w-100 px-4 py-2" 
                   style="max-width: 600px; background: rgba(255,255,255,0.95); border-radius: 20px;
                   box-shadow: 0 8px 32px rgba(0,0,0,0.1);">
                   <header class="text-center">
                       <img src="{{ asset('img/Logo_ICASVE_rmbg.png') }}" alt="Logo icasve" class="img-fluid mb-3 mt-3" style="max-width: 180px;">
                   </header>
                   <form method="POST" action="{{ route('register') }}">
                       @csrf
                       <div class="row">
                           <!-- Kolom Pertama -->
                           <div class="col-md-6">
                               <div class="form-group mb-4">
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text bg-transparent border-right-0">
                                               <i class="fas fa-user text-success"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="name" id="name" class="form-control form-control-md border-left-0" 
                                           placeholder="Full Name" value="{{ old('name') }}" required />
                                   </div>
                                   @if ($errors->has('name'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('name') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-4">
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text bg-transparent border-right-0">
                                               <i class="fas fa-envelope text-success"></i>
                                           </span>
                                       </div>
                                       <input type="email" name="email" id="email" class="form-control form-control-md border-left-0" 
                                           placeholder="Email Address" value="{{ old('email') }}" required />
                                   </div>
                                   @if ($errors->has('email'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('email') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-4">
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text bg-transparent border-right-0">
                                               <i class="fas fa-lock text-success"></i>
                                           </span>
                                       </div>
                                       <input type="password" name="password" id="password" class="form-control form-control-md border-left-0" 
                                           placeholder="Password" required />
                                   </div>
                                   @if ($errors->has('password'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('password') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-4">
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text bg-transparent border-right-0">
                                               <i class="fas fa-lock text-success"></i>
                                           </span>
                                       </div>
                                       <input type="password" name="password_confirmation" id="password_confirmation" 
                                           class="form-control form-control-md border-left-0" placeholder="Confirm Password" required />
                                   </div>
                                   @if ($errors->has('password_confirmation'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('password_confirmation') }}</span>
                                   @endif
                               </div>
                           </div>

                           <!-- Kolom Kedua -->
                           <div class="col-md-6">
                               <div class="form-group mb-4">
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text bg-transparent border-right-0">
                                               <i class="fas fa-building text-success"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="institution" id="institution" class="form-control form-control-md border-left-0" 
                                           placeholder="Institution" value="{{ old('institution') }}" required />
                                   </div>
                                   @if ($errors->has('institution'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('institution') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-4">
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text bg-transparent border-right-0">
                                               <i class="fas fa-briefcase text-success"></i>
                                           </span>
                                       </div>
                                       <input type="text" name="job_title" id="job_title" class="form-control form-control-md border-left-0" 
                                           placeholder="Job Title" value="{{ old('job_title') }}" required />
                                   </div>
                                   @if ($errors->has('job_title'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('job_title') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-4">
                                   <div class="input-group">
                                       <div class="input-group-prepend">
                                           <span class="input-group-text bg-transparent border-right-0">
                                               <i class="fas fa-phone text-success"></i>
                                           </span>
                                       </div>
                                       <input type="tel" name="phone_number" id="phone_number" class="form-control form-control-md border-left-0" 
                                           placeholder="Phone Number" value="{{ old('phone_number') }}" required />
                                   </div>
                                   @if ($errors->has('phone_number'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('phone_number') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-4">
                                   <select name="role_id" id="registration_type" class="form-control form-control-md" required>
                                       <option value="" disabled selected>Select Registration Type</option>
                                       @foreach ($role as $r)
                                           <option value="{{ $r->id }}" {{ old('role_id') == $r->id ? 'selected' : '' }}>
                                               {{ $r->display_name }}
                                           </option>
                                       @endforeach
                                   </select>
                                   @if ($errors->has('role_id'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('role_id') }}</span>
                                   @endif
                               </div>

                               <div class="form-group mb-4">
                                   <select name="attendance" id="attendance" class="form-control form-control-md" required>
                                       <option value="" disabled selected>Select Attendance Plan</option>
                                       <option value="onsite" {{ old('attendance') == 'onsite' ? 'selected' : '' }}>Onsite</option>
                                       <option value="online" {{ old('attendance') == 'online' ? 'selected' : '' }}>Online</option>
                                   </select>
                                   @if ($errors->has('attendance'))
                                       <span class="text-danger" style="font-size: 12px;">{{ $errors->first('attendance') }}</span>
                                   @endif
                               </div>
                           </div>
                       </div>

                       <button type="submit" class="btn btn-sm btn-block text-white mb-2 py-3" 
                           style="background: linear-gradient(45deg, #1B5E20, #2E7D32);
                           border-radius: 15px; transition: all 0.3s ease;">
                           <i class="fas fa-sign-in-alt mr-2"></i>Register
                       </button>
                       <footer class="text-center">
                          <p>Already have an account? <a href="{{ route('login') }}" style="color: #2E7D32;">Login</a></p>
                       </footer>
                   </form>
               </div>
           </section>
       </div>
   </main>

   <style>
    .input-group-text {
        border-radius: 15px 0 0 15px;
    }
    
    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(27,94,32,0.25);
        border-color: #2E7D32;
    }
    
    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(27,94,32,0.2);
    }
    
    @media (max-width: 991.98px) {
        .vh-100 {
            height: auto !important;
            min-height: 50vh;
        }
        
        .login-container {
            padding: 15px;
        }
        
        .form-control, .input-group-text {
            font-size: 0.875rem; 
        }
        
        button {
            font-size: 0.875rem;
            padding: 12px 20px;
        }

        .login-container {
            max-width: 100%;
        }
    }
    
    @media (max-width: 575.98px) {
        .display-4 {
            font-size: 1.5rem;
        }
        
        .p-5 {
            padding: 1rem !important;
        }
        
        .mb-5 {
            margin-bottom: 1rem !important;
        }

        .form-control, .input-group-text {
            font-size: 0.75rem; 
        }

        button {
            font-size: 0.75rem;
            padding: 10px 15px;
        }
    }
</style>

@endsection