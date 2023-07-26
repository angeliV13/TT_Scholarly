<?php

// Getting the Path
include('path_identifier.php');

$title = get_title(1);

include('includes/main.php');

?>

<body>

  <main>
    <!-- Start of Page Title -->
    <div class="pagetitle d-none">
      <h1>Register</h1>
    </div>
    <!-- End Page Title -->
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Thrive Thomasino Scholarly</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3" novalidate id="register">
                    <div class="col-md-3 position-relative">
                      <label for="inputFirstName" class="form-label">First name</label>
                      <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" name="First Name">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputMiddleName" class="form-label">Middle name</label>
                      <input type="MiddleName" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" name="Middle Name">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputLastName" class="form-label">Last name</label>
                      <input type="LastName" class="form-control" id="inputLastName" aria-describedby="inputLastName" name="Last Name">
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                      <input type="Suffix" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" name="Suffix">
                    </div>

                    <div class="col-md-4 position-relative">
                      <label for="inputDate" class="form-label">Birth Date</label>
                      <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" name="Birth Date">
                    </div>

                    <div class="col-md-5 position-relative">
                      <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                      <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" name="Birthplace">
                    </div>

                    <div class="col-md-3 position-relative">
                      <label for="inputReligion" class="form-label">Religion</label>
                      <select class="form-select" id="inputReligion" name="Religion">
                        <option selected disabled value="">Choose...</option>
                        <option value="0">Roman Catholic</option>
                        <option value="1">Islam</option>
                        <option value="2">Iglesia ni Cristo</option>
                        <option value="3">Born Again</option>
                        <option value="4">Others</option>
                        <option value="5">Prefer not to say</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a Religion.
                      </div>
                    </div>

                    <div class="col-md-4 position-relative">
                      <label for="inputGender" class="form-label">Gender</label>
                      <select class="form-select" id="inputGender" name="Gender">
                        <option selected disabled value="">Choose...</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Nonbinary</option>
                        <option value="3">Others</option>
                        <option value="4">Prefer not to say</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Gender.
                      </div>
                    </div>

                    <div class="col-md-4 position-relative">
                      <label for="inputCivilStatus" class="form-label">Civil Status</label>
                      <select class="form-select" id="inputCivilStatus" name="Civil Status">
                        <option selected disabled value="">Choose...</option>
                        <option value="0">Single</option>
                        <option value="1">Married</option>
                        <option value="2">Widowed</option>
                        <option value="3">Separated</option>
                        <option value="4">Prefer not to say</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Civil Status.
                      </div>
                    </div>

                    <div class="col-md-4 position-relative">
                      <label for="telephone" class="form-label">Contact Number</label>
                      <div class="input-group">
                        <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                        <input type="telephone" class="form-control" id="inputContactNo" aria-describedby="inputGroupPrepend2" name="Contact Number">
                      </div>
                    </div>
                    <div class="col-md-8 position-relative">
                      <label for="inputAddress" class="form-label">House/Block/Lot No. / Street / Subdivision/Village *</label>
                      <input type="Address" class="form-control" id="inputAddress" aria-describedby="inputAddress" name="Address">
                    </div>
                    <div class="col-md-4 position-relative">
                      <label for="region" class="form-label">Region</label>
                      <select class="form-select" id="region" name="Region">

                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Region.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="province" class="form-label">Province</label>
                      <select class="form-select" id="province" name="Province">

                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Province.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="city" class="form-label">Municipality</label>
                      <select class="form-select" id="city" name="Municipality">

                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Municipality.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="barangay" class="form-label">Barangay</label>
                      <select class="form-select" id="barangay" name="Barangay">

                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Barangay.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="zipCode" class="form-label">Zip Code</label>
                      <input type="text" name="Zip Code" id="zipCode" class="form-control">
                      <div class="invalid-tooltip">
                        Please input your Zip Code.
                      </div>
                    </div>
                    <div class="col-6">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" name="Username" class="form-control" id="username">
                      <div class="invalid-feedback">Please enter a valid Username!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourEmail" class="form-label">Email Address</label>
                      <input type="email" name="Email Address" class="form-control" id="yourEmail">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="Password" class="form-control" id="yourPassword">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-6">
                      <label for="verifyPassword" class="form-label">Confirm Password</label>
                      <input type="password" name="Verify Password" class="form-control" id="verifyPassword">
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-6 justify-content-center">
                      <div class="form-check">
                        <input class="form-check-input" name="Terms and Condition" type="checkbox" value="1" id="acceptTerms">
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <span><a href="#" data-bs-toggle="modal" data-bs-target="#modalDialogTerms">Policy and Terms</a></span></label>
                        <div class="modal fade" id="modalDialogTerms" tabindex="-1">
                          <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title">Policy and Terms</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <p class="small">
                                  I declare that all information we provided is true,
                                  correct and complete statement pursuant to the provisions of pertinent laws,
                                  rules and regulations of the Republic of the Philippines.
                                  I authorize the agency head/authorized representative to
                                  verify/validate the contents stated herein.
                                </p>
                                <h6 class="fs-3 fw-bolder text-center my-3 text-">
                                  Privacy Statement
                                </h6>
                                <p class="small">
                                  The City of Santo Tomas Batangas collects your personal information for the primary
                                  purpose of providing our services to you, providing information to our clients/or
                                  endorsing the same to other City of Santo Tomas Batangas department/government/private entities.
                                  And in accordance with the law, you are entitled to access and rectify your personal data.

                                  Where reasonable and practicable to do so,
                                  we will collect your personal information only from you.
                                  However, in some circumstances we may be provided with information by third parties.
                                  In such a case we will take reasonable steps to ensure that you are made aware
                                  of the information provided to us by the third party.

                                  In terms of security, the City of Santo Tomas Batangas takes technical
                                  and organizational measures to ensure that all information processed by
                                  personal information controller is protected from unauthorized access,
                                  changes or destruction.

                                  By registering, you are are giving your consent to process your personal information
                                  based on the Data Protection Policy.

                                </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" id="registerBtn">Create Account</button>
                    </div>
                    <div class="col-12 text-center">
                      <p class="small row-cols-1 mb-0">Already have an account? <a href="login.php">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <!-- <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div> -->

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('includes/libraries/javascript.php') ?>

  <script src="assets/js/register.js"></script>

</body>

</html>