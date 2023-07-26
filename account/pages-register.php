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

<<<<<<< Updated upstream
                  <form class="row g-3" novalidate id="register">
=======
                  <form class="row g-3 needs-validation" novalidate id="register">
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                    <div class="col-md-8 position-relative">
                      <label for="inputAddress" class="form-label">House/Block/Lot No. / Street / Subdivision/Village *</label>
                      <input type="Address" class="form-control" id="inputAddress" aria-describedby="inputAddress" name="Address">
                    </div>
                    <div class="col-md-4 position-relative">
=======
                    <div class="col-md-12 position-relative">
                      <label for="inputAddress" class="form-label">House/Block/Lot No. / Street / Subdivision/Village *</label>
                      <input type="Address" class="form-control" id="inputAddress" aria-describedby="inputAddress" name="Address">
                    </div>
                    <div class="col-md-3 position-relative">
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
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
=======
                    <div class="col-12">
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
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
=======
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <span><a href="#">terms and conditions</a></span></label>
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
              <!-- <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div> -->
=======
              <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>
>>>>>>> Stashed changes

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('includes/libraries/javascript.php') ?>

<<<<<<< Updated upstream
  <script src="assets/js/register.js"></script>
=======
  <script src="assets/js/locations.js"></script>
  <script src="assets/js/functions.js"></script>

  <script>
    let my_handlers = {

      fill_provinces: function() {

        let region_code = $(this).val();
        $('#province').ph_locations('fetch_list', [{
          "region_code": region_code
        }]);

      },

      fill_cities: function() {

        let province_code = $(this).val();
        $('#city').ph_locations('fetch_list', [{
          "province_code": province_code
        }]);
      },


      fill_barangays: function() {

        let city_code = $(this).val();
        $('#barangay').ph_locations('fetch_list', [{
          "city_code": city_code
        }]);
      }
    };

    $(function() {
      $('#region').on('change click', my_handlers.fill_provinces);
      $('#province').on('change click', my_handlers.fill_cities);
      $('#city').on('change click', my_handlers.fill_barangays);

      $('#region').ph_locations({
        'location_type': 'regions'
      });
      $('#province').ph_locations({
        'location_type': 'provinces'
      });
      $('#city').ph_locations({
        'location_type': 'cities'
      });
      $('#barangay').ph_locations({
        'location_type': 'barangays'
      });

      $('#region').ph_locations('fetch_list');
    });


    // Register Account

    $("#register").on("submit", function(e) {
      e.preventDefault();

      let firstName = check_error(document.getElementById("inputFirstName"));
      let middleName = $("#inputMiddleName").val();
      let lastName = check_error(document.getElementById("inputLastName"));
      let suffix = $("#inputSuffix").val();

      let birthDate = check_error(document.getElementById("inputDate"), options = {
        type: "date",
        verifyFlag: 1,
        condition: "today",
        conditionCheck: "birthdate"
      });

      let birthPlace = check_error(document.getElementById("inputBirthPlace"));
      let religion = check_error(document.getElementById("inputReligion"));
      let gender = check_error(document.getElementById("inputGender"));
      let civilStatus = check_error(document.getElementById("inputCivilStatus"));
      let contactNo = check_error(document.getElementById("inputContactNo"), options = {
        type: "number",
        verifyFlag: 1,
        conditionCheck: "contactNumber",
        regex: /^\d{10}$/,
        text: "Contact Number"
      });
      let address = check_error(document.getElementById("inputAddress"));
      let provice = check_error(document.getElementById("province"), options = {
        type: "select",
        returnVal: "text"
      });
      let city = check_error(document.getElementById("city"), options = {
        type: "select",
        returnVal: "text"
      });
      let barangay = check_error(document.getElementById("barangay"), options = {
        type: "select",
        returnVal: "text"
      });
      let email = check_error(document.getElementById("yourEmail"), options = {
        type: "input",
        verifyFlag: 1,
        regex: /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/,
        text: "Email"
      });

      let arr = [document.getElementById("yourPassword"), document.getElementById("verifyPassword")];
      let checkFlag = check_error(arr, options = {
        type: "input",
        verifyFlag: 1,
      });

      let password = checkFlag !== undefined ? checkFlag : undefined;
      let verifyPassword = checkFlag !== undefined ? checkFlag : undefined;

      let terms = document.getElementById("acceptTerms").checked;

      if (terms == false) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Please accept the terms and conditions!',
        })

        return false;
      }

      let region = check_error(document.getElementById("region"), options = {
        type: "select",
        returnVal: "text"
      });

      if (firstName !== undefined && lastName !== undefined && birthDate !== undefined && birthPlace !== undefined && religion !== undefined && gender !== undefined && civilStatus !== undefined && contactNo !== undefined && address !== undefined && provice !== undefined && city !== undefined && city !== undefined && barangay !== undefined && email !== undefined && password !== undefined) {
        $.ajax({
          url: "controller/accountHandler.php",
          type: "POST",
          data: {
            firstName: firstName,
            middleName: middleName,
            lastName: lastName,
            suffix: suffix,
            birthDate: birthDate,
            birthPlace: birthPlace,
            religion: religion,
            gender: gender,
            civilStatus: civilStatus,
            contactNo: contactNo,
            address: address,
            region: region,
            provice: provice,
            city: city,
            barangay: barangay,
            email: email,
            password: password,
            action: 2
          },
          beforeSend: function() {
            Swal.fire({
              title: 'Please wait...',
              html: 'Creating your account',
              allowOutsideClick: false,
              imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
              showConfirmButton: false,
              allowEscapeKey: false,
              allowEnterKey: false,
            })
          },
          success: function(response) {
            swal.close();
            if (response == "Success") {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Account Created Successfully! We have sent a code to your email. Please verify your account to continue.',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                timer: 2000
              }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                  emailConfirmation(response, email);
                }
              })
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: response,
                showConfirmButton: false,
              })
            }
          }
        })
      }
    })

    function emailConfirmation(code, email, counter = 0, countdown) {
      Swal.fire({
        html: '<p class="text-center">Please enter the code we sent to your email.</p><input type="text" id="code" class="form-control" placeholder="Enter Code" required><div class="invalid-feedback">Please enter the code we sent to your email.</div> <p class="text-center">Didn\'t receive the code? Resend in <b>5:00</b></p>',
        timer: 300000,
        timerProgressBar: true,
        willOpen: () => {
          Swal.getConfirmButton().removeAttribute('disabled')
          Swal.getCancelButton().setAttribute('disabled', 'disabled')
          timerInterval = setInterval(() => {
            const b = Swal.getHtmlContainer().querySelector('b')
            if (b) {
              b.textContent = Math.floor(Swal.getTimerLeft() / 60000) + ":" + Math.floor((Swal.getTimerLeft() % 60000) / 1000)
            }
          }, 100)

          if (timerInterval == 0) {
            Swal.getConfirmButton().setAttribute('disabled', 'disabled')
            Swal.getCancelButton().removeAttribute('disabled')
          }
        },
        showCancelButton: true,
        confirmButtonText: 'Verify',
        cancelButtonText: 'Resend',
        showLoaderOnConfirm: true,
        preConfirm: (code) => {
          let codeVal = document.getElementById("code").value;
          let rep = "";
          $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
              code: codeVal,
              email: email,
              action: 3
            },
            success: function(data) {
              console.log(data);
              if (data == "Success") {
                return data;
              } else {
                return data;
              }
            }
          })
        },
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
      }).then((result) => {
        console.log(result);
        if (result.isConfirmed) {
          if (code == "Success") {
            Swal.fire({
              icon: 'success',
              title: 'Success',
              text: 'Account Verified Successfully! You can now login to your account.',
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              allowEnterKey: false,
              timer: 2000
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = "login.php";
              }
            });
          } else if (code == 'Error EC003: Token Expired') {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Token Already Expired!',
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              allowEnterKey: false,
              timer: 2000
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                emailConfirmation(code, email, counter, Swal.getTimerLeft());
              }
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Invalid Code!',
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              allowEnterKey: false,
              timer: 2000
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                emailConfirmation(code, email, counter, Swal.getTimerLeft());
              }
            })
          }
        } else {
          $.ajax({
            url: "controller/accountHandler.php",
            type: "POST",
            data: {
              email: email,
              action: 4
            },
            beforeSend: function() {
              Swal.fire({
                title: 'Please wait...',
                html: 'Resending Code',
                allowOutsideClick: false,
                imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
                showConfirmButton: false,
                allowEscapeKey: false,
                allowEnterKey: false,
              })
            },
            success: function(data) {
              if (data == "success") {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Code Resent Successfully! Please check your email.',
                  showConfirmButton: false,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  allowEnterKey: false,
                  timer: 2000
                }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.timer) {
                    emailConfirmation(code, email, counter + 1);
                  }
                })
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Something went wrong. Please try again.',
                  showConfirmButton: false,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
                  allowEnterKey: false,
                  timer: 2000
                }).then((result) => {
                  if (result.dismiss === Swal.DismissReason.timer) {
                    emailConfirmation(code, email, counter);
                  }
                })
              }
            }
          })
        }
      })
    }
  </script>
>>>>>>> Stashed changes

</body>

</html>