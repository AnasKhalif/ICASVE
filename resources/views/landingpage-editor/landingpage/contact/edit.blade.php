@extends('layouts.app')
@section('title', 'Edit Contact')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">EDIT CONTACT</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.contact.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact->email }}" required placeholder="Masukkan email Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" value="{{ $contact->phone }}" required minlength="10" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" required minlength="10" placeholder="Masukkan alamat lengkap (contoh: Jl. Merdeka No. 10, Jakarta)">{{ $contact->address }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success" id="submitBtn" disabled>Update</button>
                    <a href="{{ route('landing.contact.index') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = document.getElementById('submitBtn');
            const inputs = form.querySelectorAll('input, textarea');

            function validateForm() {
                let valid = true;
                inputs.forEach(input => {
                    if (input.value.trim().length < input.minLength) {
                        valid = false;
                    }
                });
                submitBtn.disabled = !valid;
            }

            inputs.forEach(input => {
                input.addEventListener('input', validateForm);
            });

            validateForm(); // Cek form saat pertama kali load
        });
    </script>
@endsection
