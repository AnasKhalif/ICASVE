@extends('layouts.landing')

@section('title', 'Contact Us')

@section('content')

<div class="container my-5">
    <!-- Header -->
    <div class="text-center">
        <h1 class="fw-bold">Contact Us</h1>
        <p class="text-muted">If you have any questions, feel free to reach out to us.</p>
    </div>

    <div class="row mt-4">
        <!-- Contact Form -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4 rounded">
                <h4 class="fw-bold">Send Us a Message</h4>
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-md-6">
            <div class="card shadow-sm p-4 rounded bg-light">
                <h4 class="fw-bold">Our Contact Information</h4>
                <p><i class="bi bi-geo-alt"></i> <strong>Address:</strong> Faculty of Vocational Studies, Universitas Brawijaya, Indonesia</p>
                <p><i class="bi bi-envelope"></i> <strong>Email:</strong> contact@icasve.ub.ac.id</p>
                <p><i class="bi bi-telephone"></i> <strong>Phone:</strong> +62 812-3456-7890</p>
                <hr>
                <h5 class="fw-bold">Follow Us</h5>
                <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-facebook"></i> Facebook</a>
                <a href="#" class="btn btn-outline-info btn-sm"><i class="bi bi-twitter"></i> Twitter</a>
                <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>
</div>

@endsection