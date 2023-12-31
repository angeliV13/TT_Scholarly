<?php


// Getting the Path
include('path_identifier.php');
include('model/functionModel.php');
include('global_variables.php');

$title = $website_info['header'];

include('includes/main.php');

?>

<body class="body-bg">

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
                  <!-- <img src="assets/img/ttss.png" alt=""> -->
                  <span id="logo" class="d-none d-lg-block" style="position: relative;"><?= $website_info['header'] ?></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                    <p class="text-center small">Enter your personal details to create account</p>
                  </div>

                  <form class="row g-3" novalidate id="register" enctype="multipart/form-data">
                    <div class="col-md-12 position-relative">
                      <label for="scholarType" class="form-label">Scholarship Type</label>
                      <select class="form-select" id="scholarType" name="Scholarship Type">
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($scholarTypeArr as $key => $value) : ?>
                          <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a Scholarship Type.
                      </div>
                    </div>

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
                        <?php foreach ($religionArr as $key => $value) : ?>
                          <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a Religion.
                      </div>
                    </div>


                    <div class="col-md-4 position-relative">
                      <label for="inputGender" class="form-label">Gender</label>
                      <select class="form-select" id="inputGender" name="Gender">
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($genderArr as $key => $value) : ?>
                          <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Gender.
                      </div>
                    </div>


                    <div class="col-md-4 position-relative">
                      <label for="inputCivilStatus" class="form-label">Civil Status</label>
                      <select class="form-select" id="inputCivilStatus" name="Civil Status">
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($civilArr as $key => $value) : ?>
                          <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endforeach; ?>
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
                      <input class="form-control" id="region" name="Region" value="Region IV-A (Calabarzon)" readonly>
                      <div class="invalid-tooltip">
                        Please select a valid Region.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="province" class="form-label">Province</label>
                      <input class="form-control" id="province" name="Province" value="Batangas" readonly>
                      <div class="invalid-tooltip">
                        Please select a valid Province.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="city" class="form-label">Municipality</label>
                      <input class="form-control" id="city" name="Municipality" value="Santo Tomas" readonly>
                      <div class="invalid-tooltip">
                        Please select a valid Municipality.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="barangay" class="form-label">Barangay</label>
                      <select class="form-select" id="barangay" name="Barangay">
                        <?php foreach ($barangayArr as $val) : ?>
                          <option value="<?php echo $val ?>"><?php echo $val ?></option>
                        <?php endforeach; ?>
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

                    <div class="col-md-4 position-relative">
                      <label for="citizenship" class="form-label">Citizenship</label>
                      <select class="form-select" id="citizenship" name="Citizenship">
                        <option selected disabled value="">Choose...</option>
                        <?php foreach ($citizenshipArr as $key => $value) : ?>
                          <option value="<?php echo $key ?>"><?php echo $value ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Citizenship.
                      </div>
                    </div>

                    <div class="col-md-4 position-relative">
                      <label for="years" class="form-label">Years of Residency in Sto.Tomas</label>
                      <input type="number" min="0" name="Years of Residency" id="years" class="form-control">
                      <div class="invalid-tooltip">
                        Please input years of residency in Sto.Tomas.
                      </div>
                    </div>

                    <div class="col-md-4 position-relative">
                      <label for="language" class="form-label">Mother Tongue</label>
                      <input type="text" name="Mother Tongue" id="language" class="form-control">
                      <div class="invalid-tooltip">
                        Please input your language.
                      </div>
                    </div>

                    <!-- <div class="col-6">
                      <label for="fbName" class="form-label mr-2">Facebook Name</label> 
                      <input type="checkbox" name="sameAsName" id="sameAsName" class="form-check-input" disabled>
                      <label for="sameAsName" class="form-check-label">Same as Full Name</label>
                      <input type="text" class="form-control" id="fbName">
                      <div class="invalid-feedback">Please enter a valid Facebook Name!</div>
                    </div>

                    <div class="col-6">
                      <label for="fbUrl" class="form-label">Facebook URL</label>
                      <input type="url" name="Facebook URL" class="form-control" id="fbUrl">
                      <div class="invalid-feedback">Please enter a valid Facebook URL!</div>
                    </div> -->

                    <!-- <div class="col-12">
                      <label for="fbImg" class="form-label">Profile Image</label>
                      <input type="file" name="Facebook Image" class="form-control" id="fbImg">
                      <div class="invalid-feedback">Please enter a valid Profile Image!</div>
                    </div> -->

                    <!-- <div class="col-6">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" name="Username" class="form-control" id="username">
                      <div class="invalid-feedback">Please enter a valid Username!</div>
                    </div> -->


                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email Address</label>
                      <input type="email" name="Email Address" class="form-control" id="yourEmail">
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>


                    <div class="col-6">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="checkbox" name="showPW" id="showPW" class="form-check-input">
                      <label for="showPW" class="form-check-label">Show Password</label>
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
                              <div class="modal-header blue-bg">
                                <h5 class="modal-title" style="color: aliceblue;"><i class="bi bi-clipboard2-check-fill" style></i> <span style="margin: 2px;"></span>Terms and Policy</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">

                                <!-- DECLARATION OF ACCURACY -->
                                <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
                                    Declaration of Accuracy:
                                </h6>
                                <p class="small pb-3" style="text-align: justify;">
                                  I hereby declare that all information provided in this statement is true, correct, and complete,
                                  in accordance with the provisions of relevant laws, rules, and regulations of the Republic of the Philippines.
                                  I authorize the agency head/authorized representative to verify and validate the contents stated herein.
                                </p>

                                <!-- AUTHORIZATION -->
                                <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
                                    Authorization:
                                </h6>
                                <p class="small pb-3" style="text-align: justify;">
                                  By providing this information, I authorize the scholarship head/authorized
                                  representative to verify/validate the contents stated herein.
                                </p>

                                <!-- Collection of Personal Information -->
                                <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
                                    Collection of Personal Information:
                                </h6>
                                <p class="small pb-3" style="text-align: justify;">
                                  The City of Santo Tomas, Batangas, collects your personal information
                                  for the primary purpose of providing services to you, sharing information with our clients,
                                  or endorsing the same to other City of Santo Tomas Batangas departments, government agencies,
                                  or private entities. In accordance with the law, you are entitled to access and rectify your personal data.
                                </p>

                                <!-- Information Sourcing -->
                                <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
                                    Security Measures:
                                </h6>
                                <p class="small pb-3" style="text-align: justify;">
                                  The City of Santo Tomas Batangas implements technical and organizational measures
                                  to safeguard all information processed by the personal information controller from
                                  unauthorized access, changes, or destruction.
                                </p>

                                <!-- Information Sourcing -->
                                <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
                                    Consent to Data Processing:
                                </h6>
                                <p class="small pb-3" style="text-align: justify;">
                                  By registering, you are giving your consent to the processing of your personal information based on the Data Protection Policy.
                                  This document is intended to comply with applicable legal requirements and ensure the proper handling of personal information.
                                </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" style="color: #010483;" data-bs-dismiss="modal">Close</button>
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
  <script>
    $(document).ready(function() {
      $('#showPW').click(function() {
        if ($(this).is(':checked')) {
          $('#yourPassword').attr('type', 'text');
          $('#verifyPassword').attr('type', 'text');
        } else {
          $('#yourPassword').attr('type', 'password');
          $('#verifyPassword').attr('type', 'password');
        }
      });
    });
  </script>


</body>


</html>