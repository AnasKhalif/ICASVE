@extends('layouts.app')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card shadow">
        <div class="card-body">
            <h4 class="card-title border-bottom pb-3">Payment Information</h4>
            
            <div class="payment-details my-4">
                <p class="card-description font-italic mb-3">
                    Please make your payment through the following details:
                </p>
                
                <p class="mb-2">Please transfer your registration fee to:</p>
                <h5 class="font-weight-bold text-primary mb-4">Universitas Brawijaya</h5>
                
                <div class="payment-options">
                    <div class="payment-method mb-3">
                        <p class="py-3 px-4 bg-light rounded border">
                            <span class="font-weight-bold">VA Mandiri: 891187776</span>
                        </p>
                    </div>
                    
                    <p class="text-center">OR</p>
                    
                    <div class="payment-method">
                        <p class="py-3 px-4 bg-light rounded border">
                            <span class="font-weight-bold">VA BNI: 0516377760000</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 grid-margin stretch-card mt-4">
    <div class="card shadow-sm">
        <div class="card-body">
            <h4 class="card-title border-bottom pb-3">
                <i class="fas fa-file-upload mr-2"></i>Upload Payment
            </h4>
            
            <form action="{{ route('filepayments.store', ['userId' => $users->id]) }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf
                
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" 
                               class="custom-file-input @error('file') is-invalid @enderror" 
                               name="file" 
                               id="file"
                               required>
                        <label class="custom-file-label" for="file">Choose file</label>
                    </div>
                    
                </div>

                <small class="form-text text-muted mt-2">
                    Accepted formats: JPG, JPEG, PNG, PDF
                </small>

                <div class="input-group-append mt-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-upload mr-1"></i> Upload
                    </button>
                </div>

                

                @error('file')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                  @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                
                
            </form>
        </div>
    </div>
</div>

@endsection
