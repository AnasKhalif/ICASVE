@extends('layouts.landing')
@section('title', 'Contact Us')
@section('content')

@php
    // Ambil kontak terbaru dari koleksi contacts
    $latestContact = $contacts->sortByDesc('created_at')->first();

    // Ambil nomor telepon dari contact, jika tidak ada gunakan default
    $whatsappNumber = $latestContact ? $latestContact->phone : '6281905920176';

    // Jika nomor diawali dengan '0', ubah menjadi '62'
    if (substr($whatsappNumber, 0, 1) === '0') {
        $whatsappNumber = '62' . substr($whatsappNumber, 1);
    }
@endphp

<div class="container py-5">
    <!-- Header Section -->
    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <p class="lead text-muted">If you have any questions, feel free to reach out to us.</p>
    </div>

    <div class="row">
        <!-- Contact Form Section -->
        <div class="col-md-6 mb-4">
            <div class="card rounded-none" style="border-top: 5px solid #0d6efd;">
                <div class="card-body p-4">
                    <h4 class="card-title mb-4">Send Us a Message</h4>
                    <form id="contactForm">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control form-control-lg fs-6" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control form-control-lg fs-6" name="email" placeholder="you@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control form-control-lg fs-6" name="message" rows="4" placeholder="Write your message here" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Contact Information Section -->
        <div class="col-md-6 mb-4">
            <div class="card rounded-none" style="border-top: 5px solid #0d6efd;">
                <div class="card-body p-4">
                    <h4 class="card-title mb-4">Our Contact Information</h4>
                    @if ($latestContact)
                        <address class="mb-4">
                            <p class="mb-2">
                                <i class="bi bi-geo-alt me-2"></i>
                                <strong>Address:</strong> {{ $latestContact->address }}
                            </p>
                            <p class="mb-2">
                                <i class="bi bi-envelope me-2"></i>
                                <strong>Email:</strong> {{ $latestContact->email }}
                            </p>
                            <p class="mb-2">
                                <i class="bi bi-telephone me-2"></i>
                                @php
                                $phone = $latestContact->phone;
                                if (substr($phone, 0, 1) === '0') {
                                    $phone = '+62' . substr($phone, 1);
                                }
                            @endphp
                            <strong>Phone:</strong> {{ $phone }}
                            </p>
                        </address>
                    @else
                        <p class="text-muted">No contact information available.</p>
                    @endif
                
                    <hr class="my-4">
                    
                    <h5 class="fw-bold mb-3">Follow Us</h5>
                    <div class="d-flex">
                        <a href="#" class="btn btn-outline-primary btn-sm me-2">
                            <i class="bi bi-facebook me-1"></i> Facebook
                        </a>
                        <a href="#" class="btn btn-outline-info btn-sm me-2">
                            <i class="bi bi-twitter me-1"></i> Twitter
                        </a>
                        <a href="#" class="btn btn-outline-danger btn-sm">
                            <i class="bi bi-instagram me-1"></i> Instagram
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<!-- Script untuk kirim pesan via WhatsApp -->
<script>
    // Nomor WhatsApp yang diambil dari database (sudah dikonversi)
    const whatsappNumber = "{{ $whatsappNumber }}";

    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Ambil nilai dari form
        let name = document.querySelector("input[name='name']").value;
        let email = document.querySelector("input[name='email']").value;
        let message = document.querySelector("textarea[name='message']").value;

        // Format pesan yang akan dikirim
        let text = `Name: ${name}\nEmail: ${email}\nMessage: ${message}`;

        // Buat URL WhatsApp API
        let url = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${encodeURIComponent(text)}`;

        // Buka WhatsApp (pada perangkat mobile atau WhatsApp Web)
        window.open(url, '_blank');
    });
</script>

@endsection
