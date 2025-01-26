<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
  <body>
    <section>
      <div class="navbar navbar-expand-lg bg-light custom-navbar pb-5">
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center text-center text-white">
          <p class="fs-4 fw-bold pt-3">The 3rd International Conference on Applied Science for Vocational Education</p>
          <p class="fs-6 fw-bold">REGISTRATION & ABSTRACT</p>
        </div>
      </div>
      <nav class="navbar navbar-light bg-light">
        <div class="container d-flex justify-content-center align-items-center">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link active text-uppercase fw-bold text-center" style="color: grey" aria-current="page" href="req.html">Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase fw-bold text-danger text-center" href="#">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </section>
    <section class="h-100 h-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3 shadow">
              <img src="./img/icasve_logo.jpg" class="w-100" style="border-top-left-radius: 0.3rem; border-top-right-radius: 0.3rem" alt="Sample registration form photo" />
              <div class="card-body p-4 p-md-5">
                <h3 class="px-md-2 mb-2">Login</h3>
                <div class="w-80 px-md-2 mb-3 mb-md-4" style="height: 2px; background: gray"></div>
                <div class="d-flex align-items-start mb-3 px-md-2">
                  <img src="./img/check_icon.svg" alt="Check icon" class="me-2" />
                  <p class="mb-0">All attendees must complete the registration process.</p>
                </div>
                <form class="px-md-2">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Email</label>
                    <input type="text" id="form3Example1q" class="form-control" placeholder="E.g. budiutomo@gmail.com" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Access code</label>
                    <input type="text" id="form3Example1q" class="form-control" placeholder="E.g 123456" required />
                  </div>

                  <button type="submit" class="btn btn-success btn-lg mb-1">Login</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
