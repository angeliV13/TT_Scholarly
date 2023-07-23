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
    let username = check_error(document.getElementById("username"));

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

    let zipCode = check_error(document.getElementById("zipCode"));

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

    if (firstName !== undefined && lastName !== undefined && birthDate !== undefined && birthPlace !== undefined && religion !== undefined && gender !== undefined && civilStatus !== undefined && contactNo !== undefined && address !== undefined && provice !== undefined && city !== undefined && city !== undefined && barangay !== undefined && zipCode !== undefined && username && email !== undefined && password !== undefined) {
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
          zipCode: zipCode,
          username: username,
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
                emailConfirmation(email);
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

  function emailConfirmation(email, counter = 0) {
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
      },
      showCancelButton: true,
      confirmButtonText: 'Verify',
      cancelButtonText: 'Resend',
      showLoaderOnConfirm: true,
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
      },
      allowOutsideClick: false,
      allowEscapeKey: false,
      allowEnterKey: false,
    }).then((result) => {
      // console.log(code);
      if (result.isConfirmed) {
        const data = result.value;

        console.log(data);

        if (data == "Success") {
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
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong. Please try again. Error: ' + data,
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
        }

      } else if (result.dismiss === Swal.DismissReason.timer) {
        resend_email(email, 'Your token has expired. ');
      } else {
        resend_email(email);
      }
    })
  }

  function resend_email(email, text = '') {
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
              url: "controller/accountHandler.php",
              type: "POST",
              data: {
                email: email,
                action: 6
              },
              success: function(data) {

              }
            })
          })
        }
      }
    })
  }