  <main id="main" class="main">

    <!-- Start of Page Title -->
  <div class="pagetitle">
      <h1>Profile</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
      <div class="column py-2">
        <div class="col-xl-40">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="<?php echo $user_info['profile_img'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['profile_img'] ?>" alt="Profile" class="rounded-pill">
                <h2><?php echo $user_info['first_name'] . " " . $user_info['last_name'] ?></h2>
                <h3><?php echo $accType ?></h3>
              <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>
        </div>
        <div class="card">
        <div class="card-body">
          <h5 class="card-title pt-4 d-flex flex-column align-items-center"> BENEFICIARIES PROFILE</h5>

          <!-- Bordered Tabs Justified -->
          <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
              <button class="nav-link w-100 active" id="personal-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-personal-information" type="button" role="tab" aria-controls="personal-information" aria-selected="true">Personal Information</button>
            </li>
            
          </ul>

          <!-- BENEFICIARIES INFORMATION -->
          <div class="tab-content pt-2" id="borderedTabJustifiedContent">

            <!-- PERSONAL INFORMATION -->
            <div class="tab-pane fade show active" id="bordered-justified-personal-information" role="tabpanel" aria-labelledby="personal-information">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Primary Information</h5>
                  <!-- Custom Styled Validation with Tooltips -->
                  <form class="row g-4 needs-validation" novalidate>
                    <!-- FULL NAME -->
                    <div class="col-md-3 position-relative">
                      <label for="inputFirstName" class="form-label">First name</label>
                      <input type="FirstName" class="form-control" id="inputFirstName" aria-describedby="inputFirstName" value="" required>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputMiddleName" class="form-label">Middle name</label>
                      <input type="MiddleName" class="form-control" id="inputMiddleName" aria-describedby="inputMiddleName" value="" required>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputLastName" class="form-label">Last name</label>
                      <input type="LastName" class="form-control" id="inputLastName" aria-describedby="inputLastName" value="" required>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputSuffix" class="form-label">Name Suffix (Ex. Sr, Jr, III)</label>
                      <input type="Suffix" class="form-control" id="inputSuffix" aria-describedby="inputSuffix" value="" required>
                    </div>
                    <!-- END FULL NAME -->

                    <!-- BIRTH -->
                    <div class="col-md-4 position-relative">
                      <label for="inputDate" class="form-label">Birth Date</label>
                      <input type="date" class="form-control" id="inputDate" aria-describedby="inputDate" value="" required>
                    </div>

                    <div class="col-md-8 position-relative">
                      <label for="inputBirthPlace" class="form-label">Place of Birth</label>
                      <input type="inputBirthPlace" class="form-control" id="inputBirthPlace" aria-describedby="inputBirthPlace" value="" required>
                    </div>
                    <!-- END BIRTH -->

                    <!-- ADDRESS -->
                    <div class="col-md-4 position-relative">
                      <label for="inputAddress" class="form-label">Address</label>
                      <input type="Address" class="form-control" id="inputAddress" aria-describedby="inputAddress" value="" required>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputBarangay" class="form-label">Barangay</label>
                      <select class="form-select" id="inputBarangay" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Barangay.
                      </div>
                    </div>
                    <div class="col-md-2 position-relative">
                      <label for="inputMunicipality" class="form-label">Municipality</label>
                      <select class="form-select" id="inputMunicipality" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Municipality.
                      </div>
                    </div>
                    <div class="col-md-3 position-relative">
                      <label for="inputProvince" class="form-label">Province</label>
                      <select class="form-select" id="inputProvince" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Province.
                      </div>
                    </div>
                    <div class="col-md-2 position-relative">
                      <label for="inputZipCode" class="form-label">ZIP Code</label>
                      <input type="zipCode" class="form-control" id="inputZipCode" aria-describedby="inputZipCode" value="" required>
                    </div>
                    <!-- END ADDRESS -->

                    <!-- CITIZENSHIP -->
                    <div class="col-md-3 position-relative">
                      <label for="inputCitizenship" class="form-label">Citizenship</label>
                      <input type="citizenship" class="form-control" id="inputCitizenship" aria-describedby="inputCitizenship" value="" required>
                    </div>
                    <!-- END CITIZENSHIP -->

                    <!-- RESIDENCY -->
                    <div class="col-md-4 position-relative">
                      <label for="inputResidency" class="form-label">Years of Residency in Santo Tomas</label>
                      <input type="residency" class="form-control" id="inputResidency" aria-describedby="inputResidency" value="" required>
                    </div>
                    <!-- END RESIDENCY -->

                    <!-- LANGUAGE -->
                    <div class="col-md-3 position-relative">
                      <label for="inputMotherTongue" class="form-label">Mother Tongue</label>
                      <input type="Language" class="form-control" id="inputMotherTongue" aria-describedby="inputMotherTongue" value="" required>
                    </div>
                    <!-- END LANGUAGE -->

                    <!-- START RELIGION -->
                    <div class="col-md-4 position-relative">
                      <label for="inputReligion" class="form-label">Religion</label>
                      <select class="form-select" id="inputReligion" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a Religion.
                      </div>
                    </div>
                    <!-- END RELIGION -->

                    <!-- SEX -->
                    <div class="col-md-4 position-relative">
                      <label for="inputGender" class="form-label">Gender</label>
                      <select class="form-select" id="inputGender" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Gender.
                      </div>
                    </div>
                    <!--END SEX -->

                    <!--CIVIL STATUS -->
                    <div class="col-md-4 position-relative">
                      <label for="inputCivilStatus" class="form-label">Civil Status</label>
                      <select class="form-select" id="inputCivilStatus" required>
                        <option selected disabled value="">Choose...</option>
                        <option>...</option>
                      </select>
                      <div class="invalid-tooltip">
                        Please select a valid Civil Status.
                      </div>
                    </div>
                    <!-- END CIVIL STATUS -->

                    <!-- SUBMIT BUTTON-->
                    <!-- <div class="col-12">
                          <button class="btn btn-primary" type="submit">Submit form</button>
                        </div> -->
                    <!--END SUBMIT BUTTON-->
                  </form><!-- End Custom Styled Validation with Tooltips -->
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Contact Information</h5>
                  <!-- Custom Styled Validation with Tooltips -->
                  <form class="row g-4 needs-validation" novalidate>
                    <!-- CONTACT INFORMATION -->
                    <div class="col-md-5 position-relative">
                      <label for="telephone" class="form-label">Contact Number</label>
                      <div class="input-group">
                        <span span class="input-group-text" id="inputGroupPrepend2">+63</span>
                        <input type="telephone" class="form-control" id="validationDefaultContactNo." aria-describedby="inputGroupPrepend2" required>
                      </div>
                    </div>
                    <div class="col-md-7 position-relative">
                      <label for="EmailAddress" class="form-label">Email Address</label>
                      <input type="EmailAddress" class="form-control" id="inputEmailAddress" aria-describedby="inputEmailAddress" value="" required>
                    </div>
                  </form><!-- End Custom Styled Validation with Tooltips -->
                </div>
              </div>
            </div>
          </div>
          <!-- End Bordered Tabs Justified -->
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->