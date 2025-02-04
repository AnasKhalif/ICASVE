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
                    <i class="fas fa-file-upload mr-2"></i>Payment Details
                </h4>

                @if ($existingPayment)
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        @if ($existingPayment->file_path)
                            @if ($existingPayment->amount)
                                File yang berhasil diunggah dan Jumlah pembayaran: Rp
                                {{ number_format($existingPayment->amount, 0, ',', '.') }}
                            @endif
                        @endif

                    </div>
                @endif

                <form action="{{ route('filepayments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="amount">Jumlah Pembayaran (Rp)</label>
                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount"
                            name="amount" value="{{ old('amount') }}" placeholder="Contoh: 100000"
                            @if (!$existingPayment) required @endif>
                        <small class="form-text text-muted">
                            Masukkan jumlah tanpa tanda titik atau koma
                        </small>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('file') is-invalid @enderror"
                                name="file" @if (!$existingPayment) required @endif id="file">
                            <label class="custom-file-label" for="file" id="fileLabel">Choose file</label>
                        </div>
                    </div>

                    <small class="form-text text-muted mt-2">
                        Format yang diterima: JPG, JPEG, PNG, PDF | Maksimal: 2MB
                    </small>

                    <div class="input-group-append mt-3">
                        <button type="submit" class="btn btn-primary mr-3">
                            <i class="fas fa-save mr-1"></i>
                            {{ $existingPayment ? 'Update' : 'Save' }}
                        </button>
                        @if ($existingPayment && $existingPayment->file_path)
                            <a href="{{ Storage::url($existingPayment->file_path) }}" class="btn btn-light" target="_blank">
                                <i class="fas fa-file mr-1"></i>
                                View File
                            </a>
                        @endif
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

                <script>
                    document.getElementById('file').addEventListener('change', function() {
                        var fileName = this.files[0] ? this.files[0].name : 'Choose file';
                        document.getElementById('fileLabel').innerText = fileName;
                    });

                    document.querySelector('form').addEventListener('submit', function(e) {
                        let amountInput = document.getElementById('amount');
                        amountInput.value = amountInput.value.replace(/\D/g, '');
                        if (isNaN(amountInput.value) || amountInput.value === '') {
                            e.preventDefault();
                            alert('Jumlah pembayaran harus berupa angka yang valid.');
                        }
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
