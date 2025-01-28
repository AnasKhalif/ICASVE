<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile | ICASVE</title>
    @include('layouts.partials.link')
</head>
<body>
    <header class="container-fluid py-3">
            <div class="container d-flex justify-content-end">
                <button class="btn btn-danger btn-sm font-weight-bold px-4 py-3" style="font-size: 15px">Logout</button>
            </div>
        </nav>
    </header>
    
    <main class="container py-4">
        <article class="card mb-4 shadow-sm">
            <header class="card-header bg-danger">
                <h2 class="h4 text-white mb-0">PROFILE</h2>
            </header>
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <img class="rounded-circle img-fluid" style="max-width: 200px;" 
                             src="https://cdn-icons-png.flaticon.com/512/149/149071.png" 
                             alt="User profile photo">
                    </div>
                    <div class="col-md-8">
                        <dl class="row">
                            <dt class="col-sm-3">Name :</dt>
                            <dd class="col-sm-9">{{ $user->name }}</dd>

                            <dt class="col-sm-3">Email :</dt>
                            <dd class="col-sm-9">{{ $user->email }}</dd>

                            <dt class="col-sm-3">Job Title :</dt>
                            <dd class="col-sm-9">{{ $user->job_title }}</dd>

                            <dt class="col-sm-3">Institution :</dt>
                            <dd class="col-sm-9">{{ $user->institution }}</dd>

                            <dt class="col-sm-3">Phone :</dt>
                            <dd class="col-sm-9">{{ $user->phone_number }}</dd>

                            <dt class="col-sm-3">Registration :</dt>
                            <dd class="col-sm-9">{{ $user->permission_role }}</dd>

                            <dt class="col-sm-3">Attendance :</dt>
                            <dd class="col-sm-9">{{ $user->attendance }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </article>

        <article class="card mb-4 shadow-sm">
            <header class="card-header bg-danger">
                <h2 class="h4 text-white mb-0">ABSTRACT</h2>
            </header>
            <div class="card-body">
                <div class="mb-4">
                    <a href="{{route('add_abstract.create')}}" 
                       class="btn btn-success font-weight-bold">
                        + NEW ABSTRACT
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ABS ID</th>
                                <th scope="col">TITLE</th>
                                <th scope="col">FULL PAPER</th>
                                <th scope="col">EDIT ABSTRACT</th>
                                <th scope="col">STATUS</th>
                                <th scope="col">DELETE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>93</td>
                                <td>
                                    <strong>testing123</strong>
                                    <br>
                                    <small class="text-muted">
                                        Technological Engineering
                                        <br>
                                        Request: Oral presentation
                                    </small>
                                </td>
                                <td><span class="badge badge-success">Open</span></td>
                                <td><button class="btn btn-sm btn-outline-primary">Edit</button></td>
                                <td><span class="badge badge-success">Open</span></td>
                                <td><button class="btn btn-sm btn-outline-danger">Delete</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <footer class="mt-3">
                    <small class="text-muted">
                        <p>*) Full paper can be uploaded after the abstract is accepted.</p>
                        <p>**) If two or more reviewers give their comments to your paper (not your abstract), 
                           please write down your response to all reviewers in ONE file.</p>
                    </small>
                </footer>
            </div>
        </article>

        <article class="card mb-4 shadow-sm">
            <header class="card-header bg-danger">
                <h2 class="h4 text-white mb-0">PAYMENT</h2>
            </header>
            <div class="card-body">
                <h3 class="h5 font-weight-bold">Payment Information</h3>
                <p class="font-italic">Please make your payment through the following detail:</p>
                
                <div class="payment-details mb-4">
                    <p class="mb-2">Please transfer your registration fee to:</p>
                    <p class="mb-1"><strong>Universitas Brawijaya</strong></p>
                    <div class="card bg-light p-3 mb-3">
                        <p class="mb-1">VA Mandiri ICASVE: 891187776</p>
                    </div>
                    
                    <p class="text-center mb-3">OR</p>
                    
                    <div class="card bg-light p-3">
                        <p class="mb-1">VA ICASVE BNI: 0516377760000</p>
                    </div>
                </div>

                <hr>

                <div class="receipt-section">
                    <h3 class="h5 font-weight-bold">Receipt File</h3>
                    <img src="{{ asset('img/receipt.jpg') }}" alt="Receipt File" class="img-fluid mb-3">
                    <div class="alert alert-success">
                        Thank you. Your payment amount IDR 500,000 has been verified.
                    </div>
                    <button class="btn btn-info">
                        <i class="fas fa-download mr-2"></i>DOWNLOAD RECEIPT
                    </button>
                </div>
            </div>
        </article>
    </main>

    <footer class="container-fluid py-3 bg-light">
        <div class="container text-center">
            <small class="text-muted">© 2025 ICASVE.</small>
        </div>
    </footer>
</body>
</html>