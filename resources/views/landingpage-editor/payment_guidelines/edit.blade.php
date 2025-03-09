@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Payment Guideline</h1>
    
    <a href="{{ route('landing.payment_guidelines.index') }}" class="btn btn-secondary mb-3">Kembali</a>

    <form action="{{ route('landing.payment_guidelines.update', $paymentGuideline->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Bank</label>
            <input type="text" name="bank_name" class="form-control" 
                value="{{ old('bank_name', $paymentGuideline->bank_name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="year" class="form-control" 
                value="{{ old('year', $paymentGuideline->year) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Guideline</label>
            <textarea id="guideline-editor" name="guideline" class="form-control" required>
                {{ old('guideline', $paymentGuideline->guideline) }}
            </textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    </form>
</div>

{{-- CKEditor Script --}}
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
<script>
     CKEDITOR.config.versionCheck = false;
    CKEDITOR.replace('guideline-editor', {
        height: 300
    });
</script>

@endsection
