@extends('layouts.app')

@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-4">
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="card-title border-bottom pb-3">
                    <i class="fa fa-file-text mr-2"></i>Manual Receipt
                </h4>
                <div class="py-2 px-3 rounded border mb-3 alert alert-info">
                    <p>Unless in emergency situation, issuing receipt manually is NOT recommended.</p>
                </div>

                <form action="{{ route('admin.manual-receipt.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf 
                
                    <div class="form-outline mb-4">
                        <label class="form-label" for="attendance">Participants Name</label>
                        <select name="attendance" id="attendance" class="form-select" required>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('attendance') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('attendance')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group mb-4">
                        <label for="amount">Payment Amount (Rp)</label>
                        <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount"
                            name="amount" value="{{ old('amount') }}" placeholder="Contoh: 100000"
                            @if ($users->where('id', old('attendance'))->first()?->hasPayment) required @endif>
                        <small class="form-text text-muted">
                            Masukkan jumlah tanpa tanda titik atau koma
                        </small>
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                       
                    <button type="submit" class="btn btn-primary">Make Receipt</button>
                </form>
                
                
            </div>
        </div>
    </div>
@endsection
