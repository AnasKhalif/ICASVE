<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Abstract</title>
    @include('layouts.partials.link')
</head>
<body>
    <header class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <a href="{{ route('abstract-user.index') }}" 
                   class="btn btn-danger btn-sm font-weight-bold px-4 py-2 shadow-sm rounded-pill" 
                   style="font-size: 15px; transition: all 0.3s ease;">
                   ← Back
                </a>
            </div>
        </div>
    </header>
    
    <main class="container pb-5">
        <section class="row justify-content-center">
            <div class="col-lg-8 col-xl-6">
                <article class="card shadow rounded-3">
                    <div class="card-body p-4">
                        <header class="mb-4">
                            <h1 class="h3 text-center">New Abstract</h1>
                            <hr class="w-75 mx-auto bg-secondary">
                        </header>
                        <div class="alert alert-info mb-4">
                            <p>Refer to the formatting guideline at the bottom for special text formatting in abstract title and content, such as:</p>
                            <p>C<sub>2</sub>H<sub>3</sub>O<sub>2</sub><sup>-</sup></p>
                        </div>
                        <form method="POST" action="{{ route('abstract-user.index') }}">
                            <div class="form-group">
                                <label for="field">Field</label>
                                <select id="field" name="field" class="form-control" required>
                                    <option value="1">Economic and Business</option>
                                    <option value="2">Corporate Social Responsibility</option>
                                    <option value="3">Tourism and Hospitality</option>
                                    <option value="4">Technological Engineering</option>
                                    <option value="5">Design Innovation</option>
                                    <option value="6">Governance and Public Administration</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="presentation">Presentation Type</label>
                                <select id="presentation" name="presentation" class="form-control" required>
                                    <option value="0">Oral presentation</option>
                                    <option value="1">Poster presentation</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="authors">Authors</label>
                                <small class="form-text text-success">Follow the example below:</small>
                                <small class="form-text text-muted">Martin Karplus*[1], Werner Heisenberg[2], Ada Lovelace[2]</small>
                                <input type="text" id="authors" name="authors" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="affiliations">Affiliations</label>
                                <small class="form-text text-success">Follow the example below:</small>
                                <small class="form-text text-muted">
                                    [1]Dept. of Chemistry, Brawijaya University, Malang<br>
                                    [2]Dept. of Mathematics, University of Berkeley, California
                                </small>
                                <textarea id="affiliations" name="affiliations" rows="4" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Corresponding Email</label>
                                <small class="form-text text-muted">Example: martinkarplus@gmail.com</small>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="abstract">Abstract</label>
                                <small class="form-text text-muted">Maximum words: 350. Refer to formatting guidelines below.</small>
                                <textarea id="abstract" name="abstract" rows="6" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-block text-uppercase">Save for Submission</button>
                        </form>
                        <footer class="mt-4">
                            <ul class="list-unstyled">
                                <li class="mb-2 d-flex">
                                    <img src="{{ asset('img/check_icon.svg') }}" alt="Check icon" class="mr-2" width="20">
                                    After saving, your abstract will be stored.
                                </li>
                                <li class="mb-2 d-flex">
                                    <img src="{{ asset('img/check_icon.svg') }}" alt="Check icon" class="mr-2" width="20">
                                    You can edit your saved abstract before the submission deadline.
                                </li>
                                <li class="d-flex">
                                    <img src="{{ asset('img/check_icon.svg') }}" alt="Check icon" class="mr-2" width="20">
                                    After the deadline, editing will no longer be possible.
                                </li>
                            </ul>
                        </footer>
                    </div>
                </article>
            </div>
        </section>
    </main>
    
</body>
</html>
