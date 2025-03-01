@extends('layouts.app')
@section('title', 'Add Contact')
@section('content')
    <div class="container mt-4">
        <h2 class="text-center fw-bold">ADD CONTACT</h2>
        <hr class="border border-success">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('landing.contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="Masukkan email Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="tel" name="phone" class="form-control" required minlength="10" placeholder="Masukkan nomor telepon">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" required minlength="10" placeholder="Masukkan alamat lengkap (contoh: Jl. Merdeka No. 10, Jakarta)"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submitBtn" disabled>Save</button>
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
        });
    </script>
@endsection
