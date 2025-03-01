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
                        @if (!empty($conferenceSetting->bank_account))
                            @php
                                $bankAccounts = explode(',', $conferenceSetting->bank_account);
                            @endphp

                            @foreach ($bankAccounts as $index => $bankAccount)
                                <div class="payment-method mb-3">
                                    <p class="py-3 px-4 bg-light rounded border">
                                        <span class="font-weight-bold">{{ trim($bankAccount) }}</span>
                                    </p>
                                </div>

                                @if ($index !== count($bankAccounts) - 1)
                                    <p class="text-center">OR</p>
                                @endif
                            @endforeach
                        @else
                            <p class="text-center text-danger">No payment methods available</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="card-title border-bottom pb-3">Payment Instruction</h4>
                <div class="payment-details my-4">
                    <p class="card-description font-italic mb-3">
                        Please make your payment through the following details:
                    </p>
                    <ol class="pl-3">
                        <li>Transfer the registration fee to the bank account listed above.</li>
                        <li>Take a screenshot or download the payment receipt.</li>
                        <li>Return to this payment page and select the currency that matches your transfer.</li>
                        <li>After selecting the currency, enter the exact amount you transferred in the "Payment Amount"
                            field.</li>
                        <li>Upload the payment receipt using the form below.</li>
                        <li>Click the "Save" button to submit your payment details.</li>
                        <li>Wait for verification. You will be notified once it is confirmed.</li>
                        <li>Once your payment is verified, you will be able to download your receipt as proof of payment.
                        </li>
                    </ol>
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

                @if ($existingPayment && $existingPayment->amount)
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        File berhasil diunggah dan Jumlah pembayaran:
                        <span id="existingAmount">Rp {{ number_format($existingPayment->amount, 0, ',', '.') }} has been
                            {{ $existingPayment->status }}</span>
                    </div>
                @endif

                <form action="{{ route('filepayments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (!$existingPayment || $existingPayment->status !== 'verified')
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
                    @endif

                    <div class="input-group-append mt-3">
                        @if (!$existingPayment || $existingPayment->status !== 'verified')
                            <button type="submit" class="btn btn-primary mr-3">
                                <i class="fas fa-save mr-1"></i>
                                {{ $existingPayment ? 'Update' : 'Save' }}
                            </button>
                        @endif
                        @if ($existingPayment && $existingPayment->file_path)
                            <a href="{{ Storage::url($existingPayment->file_path) }}" class="btn btn-light" target="_blank">
                                <i class="fas fa-file mr-1"></i>
                                View File
                            </a>
                        @endif
                        @if ($existingPayment && $existingPayment->status === 'verified')
                            <a href="{{ route('filepayments.receipt', $existingPayment->id) }}" target="_blank"
                                class="btn btn-outline-primary ml-2">
                                Digital PDF
                            </a>
                        @endif
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @error('file')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
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
