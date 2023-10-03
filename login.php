<?php
session_start();
require_once("functions/code.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="Aperture">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IMS - Login</title>
  <meta name="description" content="Aperture">
  <link rel="stylesheet" href="assets/lib/bootstrap/dist/css/bootstrap.min.css" />

  <link href="assets/lib/bootstrap/dist/css/bootstrap.css.map">

  <link rel="stylesheet" href="assets/css/login.css" />
</head>

<body>
  <script src="assets/js/sweetalert2.js"></script>
  <?php
  if (isset($_SESSION['message'])) {
  ?>
    <script>
      Swal.fire({
        icon: <?= "'" . $_SESSION['icon'] . "'" ?>,
        text: <?= "'" . $_SESSION['message'] . "'" ?>,
        confirmButtonColor: '#151515',
        backdrop: 'rgba(63, 194, 139, 0.5)'
      })
    </script>
  <?php unset($_SESSION['message']);
  } else
  ?>

  <!-- Section: Design Block -->
  <section class="overflow-hidden">
    <div class="container px-5 d-flex align-items-center justify-content-center text-lg-start ">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6" style="z-index: 10">
          <h1 class="my-5 display-5 fw-bold ls-tight text-white">
            The best offer <br />
            your business
          </h1>
          <p class="mb-4 opacity-70 text-white">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Temporibus, expedita iusto veniam atque, magni tempora mollitia
            dolorum consequatur nulla, neque debitis eos reprehenderit quasi
            ab ipsum nisi dolorem modi. Quos?
          </p>
        </div>

        <div class="col-lg-6 position-relative">
          <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
          <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

          <div class="card bg-glass">
            <div class="card-body ">
              <ul class="nav nav-pills log nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" 0role="presentation">
                  <a class="nav-link active" id="tab-register" data-bs-toggle="tab" data-mdb-toggle="pill" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="tab-login" data-bs-toggle="tab" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade show" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                  <form action="functions/auth.php" method="post" autocomplete="off" class="row g-3 needs-validation">
                    <div class="col-12 form-outline">
                      <label for="email-login" class="form-label">Email address</label>
                      <input type="text" class="form-control" id="email-login" aria-describedby="emailHelp" autocomplete="off" placeholder="name@domain.com" required name="email-login">
                      <small id="emailvalid" class="form-text text-danger invalid-feedback">Email must be valid!</small>
                    </div>

                    <div class="py-1 col-12 form-outline">
                      <label for="password-login">Password</label>
                      <input name="password-login" type="password" class="form-control form-control-sm" autocomplete="off" id="password-login" aria-describedby="passwordHelp" value="" required />
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck1">
                        <label class="form-check-label" for="invalidCheck2">
                          Remember me
                        </label>
                      </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                      <input class="btn" name="login-btn" type="submit" value="Login"></input>
                    </div>
                  </form>
                </div>

                <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-login">
                  <form action="functions/auth.php" method="post" class="row g-3 needs-validation" novalidate>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-outline">
                      <label for="fname-register" class="form-label-sm text">First Name</label>
                      <input type="text" class="form-control form-control-sm" id="fname-register" name="fname-register" aria-describedby="inputGroupPrepend3 name-registerFeedback" required>
                      <div id="fname-registerFeedback" class="invalid-feedback">
                        Write your first name correctly!
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-outline">
                      <label for="lname-register" class="form-label-sm">Last Name</label>
                      <input type="text" class="form-control form-control-sm" id="lname-register" name="lname-register" aria-describedby="inputGroupPrepend3 name-registerFeedback" required>
                      <div id="lname-registerFeedback" class="invalid-feedback">
                        Write your last name correctly!
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-outline">
                      <label class="form-label-sm" for="phone-register">Phone number</label>
                      <input type="tel" id="phone-register" class="form-control form-control-sm" placeholder="7xxxxxxxx" name="phone-register" />
                      <div id="phone-registerFeedback" class="invalid-feedback">
                        Write your number correctly!
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-outline">
                      <label for="Username-register" class="form-label-sm">Username</label>
                      <div class="input-group input-group-sm has-validation">
                        <span class="input-group-text" id="inputGroupPrepend3">@</span>
                        <input type="text" class="form-control form-control-sm" id="username-register" name="username-register" aria-describedby="inputGroupPrepend3 username-registerFeedback" required>
                        <div id="username-registerFeedback" class="invalid-feedback">
                          Please write a valid username.
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-outline">
                      <label for="email-register" class="form-label-sm">Email address</label>
                      <input type="text" class="form-control form-control-sm" id="email-register" aria-describedby="emailHelp-register" autocomplete="off" placeholder="name@domain.com" name="email-register" required>
                      <div id="emailHelp-register" class="form-text">
                      </div>
                      <small class="form-text text-danger invalid-feedback">Email must be valid!</small>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 form-outline">
                      <label for="gender-register" class="form-label-sm">Gender</label>
                      <select name="gender-register" class="form-select form-select-sm">
                        <option selected disabled>You are...</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Don't mention it</option>
                      </select>
                    </div>

                    <div class="col-12 form-outline">
                      <label for="password-register">Password</label>
                      <input name="password-register" type="password" class="form-control form-control-sm" autocomplete="off" id="password-register" aria-describedby="passwordHelp" required />
                    </div>

                    <div class="col-12 form-outline">
                      <label for="conPassword-register">Conform password</label>
                      <input name="conPassword-register" type="password" class="form-control form-control-sm" autocomplete="off" id="conPassword-register" aria-describedby="conPasswordHelp" value="" required />
                      <div id="conPassword-registerFeedback" class="invalid-feedback">
                        Doesn't match!
                      </div>
                    </div>

                    <div class="password-strength-group col-12" data-strength="">
                      <div id="password-strength-meter" class="mb-4 mt-1 password-strength-meter">
                        <div class="meter-block"></div>
                        <div class="meter-block"></div>
                        <div class="meter-block"></div>
                        <div class="meter-block"></div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terms-register" id="invalidCheck">
                        <label class="form-check-label" for="invalidCheck">
                          Agree to terms and conditions
                        </label>

                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                      <input class="btn" name="register-btn" type="submit" value="Create account"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

  <script src="assets/lib/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/form.js"></script>
  <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>