<?php

// Getting the Path
include('path_identifier.php');

$title = get_title(1);

include('includes/main.php');

?>

<body>

  <main>
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

                  <form class="row g-3 needs-validation" novalidate id="register">
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
                    <div class="col-md-12 position-relative">
                      <label for="inputAddress" class="form-label">House/Block/Lot No. / Street / Subdivision/Village *</label>
                      <input type="Address" class="form-control" id="inputAddress" aria-describedby="inputAddress" name="Address">
                    </div>
                    <div class="col-md-3 position-relative">
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
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <span><a href="#">terms and conditions</a></span></label>
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

              <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <?php include('includes/libraries/javascript.php') ?>

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
<<<<<<< Updated upstream
      let username = check_error(document.getElementById("username"));
=======
>>>>>>> Stashed changes

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

<<<<<<< Updated upstream
      if (firstName !== undefined && lastName !== undefined && birthDate !== undefined && birthPlace !== undefined && religion !== undefined && gender !== undefined && civilStatus !== undefined && contactNo !== undefined && address !== undefined && provice !== undefined && city !== undefined && city !== undefined && barangay !== undefined && username && email !== undefined && password !== undefined) {
=======
      if (firstName !== undefined && lastName !== undefined && birthDate !== undefined && birthPlace !== undefined && religion !== undefined && gender !== undefined && civilStatus !== undefined && contactNo !== undefined && address !== undefined && provice !== undefined && city !== undefined && city !== undefined && barangay !== undefined && email !== undefined && password !== undefined) {
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
            username: username,
=======
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
                  emailConfirmation(email);
=======
                  emailConfirmation(response, email);
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
    function emailConfirmation(email, counter = 0) {
=======
    function emailConfirmation(code, email, counter = 0, countdown) {
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
              const hours = Math.floor(Swal.getTimerLeft() / 3600000)
              const minutes = Math.floor((Swal.getTimerLeft() % 3600000) / 60000)
              const seconds = Math.floor((Swal.getTimerLeft() % 60000) / 1000)

              if (seconds < 10) {
                b.textContent = `${minutes}:0${seconds}`
              } else {
                b.textContent = `${minutes}:${seconds}`
              }

              if (Swal.getTimerLeft() == 0) {
                Swal.getConfirmButton().setAttribute('disabled', 'disabled')
                Swal.getCancelButton().removeAttribute('disabled')
              }
            }
          }, 100);
=======
              b.textContent = Math.floor(Swal.getTimerLeft() / 60000) + ":" + Math.floor((Swal.getTimerLeft() % 60000) / 1000)
            }
          }, 100)

          if (timerInterval == 0) {
            Swal.getConfirmButton().setAttribute('disabled', 'disabled')
            Swal.getCancelButton().removeAttribute('disabled')
          }
>>>>>>> Stashed changes
        },
        showCancelButton: true,
        confirmButtonText: 'Verify',
        cancelButtonText: 'Resend',
        showLoaderOnConfirm: true,
<<<<<<< Updated upstream
        preConfirm: (value) => {
          let code = document.getElementById("code").value;

          return new Promise((resolve) => {
            setTimeout(() => {
              if (code.trim() === '') {
                Swal.showValidationMessage(
                  `Please enter the code we sent to your email.`
                )
                resolve(false);
                Swal.getCancelButton().addAttribute('disabled', 'disabled');
              } else {
                $.ajax({
                  url: "controller/accountHandler.php",
                  type: "POST",
                  data: {
                    code: code,
                    email: email,
                    action: 3
                  },
                  success: function(data) {
                    console.log(data);
                    if (data == "Success") {
                      resolve("Success");
                    } else if (data == 'Error EC003: Token Expired') {
                      Swal.showValidationMessage(
                        `Token already expired. Please press the resend button to continue.`
                      );
                      Swal.getCancelButton().setAttribute('disabled', 'disabled');
                      resolve(false);
                    } else if (data == 'Invalid Token') {
                      Swal.showValidationMessage(
                        `Error: ${data}`
                      );
                      Swal.getCancelButton().setAttribute('disabled', 'disabled');
                      resolve(false);
                    }
                  }
                })
              }
            }, 1000)
          });
=======
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
>>>>>>> Stashed changes
        },
        allowOutsideClick: false,
        allowEscapeKey: false,
        allowEnterKey: false,
      }).then((result) => {
<<<<<<< Updated upstream
        // console.log(code);
        if (result.isConfirmed) {
          const data = result.value;

          console.log(data);

          if (data == "Success") {
=======
        console.log(result);
        if (result.isConfirmed) {
          if (code == "Success") {
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong. Please try again. Error: ' + data,
=======
          } else if (code == 'Error EC003: Token Expired') {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Token Already Expired!',
>>>>>>> Stashed changes
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              allowEnterKey: false,
              timer: 2000
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
<<<<<<< Updated upstream
                emailConfirmation(email);
              }
            })
          }

        } 
        else if (result.dismiss === Swal.DismissReason.timer) {
          resend_email(email, 'Your token has expired. ');
        } else {
          resend_email(email);
        }
      })
    }

    function resend_email(email, text = ''){
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
            html: `${text}Resending Code`,
            allowOutsideClick: false,
            imageUrl: "https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif",
            showConfirmButton: false,
            allowEscapeKey: false,
            allowEnterKey: false,
          })
        },
        success: function(data) {
          if (data == "Success") {
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
                emailConfirmation(email);
              }
            })
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Something went wrong. Please register again later. Error: ' + data,
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              allowEnterKey: false,
              timer: 2000
            }).then((result) => {
              $.ajax({
                url : "controller/accountHandler.php",
                type : "POST",
                data : {
                  email : email,
                  action : 6
                },
                success : function(data){

                }
              })
            })
          }
        }
      })
    }

=======
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
>>>>>>> Stashed changes
  </script>

</body>

</html>