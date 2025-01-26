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
              <a class="nav-link active text-uppercase fw-bold text-danger text-center" aria-current="page" href="#">Registration</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase fw-bold text-center" style="color: gray" href="login.html">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </section>
    <section class="h-100 h-custom">
      <!-- style= style="background-color: #8fc4b7" -->
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3 shadow">
              <!-- link  link : "https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp -->
              <img src="./img/icasve_logo.jpg" class="w-100" style="border-top-left-radius: 0.3rem; border-top-right-radius: 0.3rem" alt="Sample registration form photo" />
              <div class="card-body p-4 p-md-5">
                <h4 class="mb-2">REGISTRATION FORM</h4>
                <div class="w-80 px-md-2" style="height: 2px; background: gray"></div>
                <div class="px-md-2 mt-3">
                  <div class="d-flex align-items-start mb-3">
                    <img src="./img/check_icon.svg" alt="Check icon" class="me-2" />
                    <p class="mb-0">All attendees must complete the registration process.</p>
                  </div>

                  <div class="d-flex align-items-start mb-3">
                    <img src="./img/check_icon.svg" alt="Check icon" class="me-2" />
                    <div class="d-flex flex-column">
                      <p class="mb-1">One attendee should register only <strong>ONCE</strong>. If the committee allows,one attendee can submit multiple abstracts using this system.</p>
                    </div>
                  </div>

                  <div class="d-flex align-items-start mb-3">
                    <img src="./img/check_icon.svg" alt="check icon" class="me-2" />
                    <p class="mb-0">Do not use your name and email to register other attendees.</p>
                  </div>
                </div>
                <form class="px-md-2">
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Name</label>
                    <input type="text" id="form3Example1q" class="form-control" placeholder="E.g. Budi Utomo" required />
                    <p style="font-size: 12px">
                      This will be used to print your <span class="fw-bold">certificate</span>, so make sure that the spelling is correct. If you want your academic title to be printed on the certificate, please input the degree along with
                      your name (e.g. Budi Utomo, Ph.D).
                    </p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Email address</label>
                    <input type="text" id="form3Example1q" class="form-control" placeholder="E.g. budiutomo@gmail.com" required />
                    <p style="font-size: 12px">The committee will use this email as the primary way to communicate with you, so make sure that the email is actively used.</p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Institution</label>
                    <input type="text" id="form3Example1q" class="form-control" placeholder="E.g. Faculty of Science, Brawijaya University" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Job title</label>
                    <input type="text" id="form3Example1q" class="form-control" placeholder="E.g. Professor,PhD,student, etc." required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1q">Phone number</label>
                    <input type="text" id="form3Example1q" class="form-control" placeholder="Enter your Phone number" required />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="registration_type">Registration type</label>
                    <select class="form-select" id="registration_type" required>
                      <option value="" selected disabled>Choose type</option>
                      <option value="indonesia_presenter">Indonesia Presenter</option>
                      <option value="foreign_presenter">Foreign Presenter</option>
                      <option value="indonesia_participant">Indonesia Participant</option>
                      <option value="foreign_participant">Foreign Participant</option>
                    </select>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="attendance_plan">Attendance plan</label>
                    <select class="form-select" id="attendance_plan" required>
                      <option value="" selected disabled>Choose</option>
                      <option value="onsite">Onsite</option>
                      <option value="online">Online</option>
                    </select>
                  </div>

                  <button type="submit" class="btn btn-success btn-lg mb-1">Proceed</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
