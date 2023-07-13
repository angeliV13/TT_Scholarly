<main id="main" class="main">
  <!-- End Page Title -->
  <section class="section profile">
    <div class="column py-2">
      <div class="col-xl-40">
        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <img src="" alt="Profile" class="rounded-circle">
            <h2>NAME</h2>
            <h3>Web Designer</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">PROFILE</h5>
          <a href="#" data-bs-toggle="modal" data-bs-target="" class="btn btn-sm btn-danger shadow-sm">
            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Edit Profile</a>
        </div>
        <!-- Bordered Tabs Justified -->
        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100 active" id="personal-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-personal-information" type="button" role="tab" aria-controls="personal-information" aria-selected="true">Personal Information</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="educational-background" data-bs-toggle="tab" data-bs-target="#bordered-justified-educational-background" type="button" role="tab" aria-controls="educational-background" aria-selected="false">Educational Background</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="family-background" data-bs-toggle="tab" data-bs-target="#bordered-justified-family-background" type="button" role="tab" aria-controls="family-background" aria-selected="false">Family Background</button>
          </li>
          <li class="nav-item flex-fill" role="presentation">
            <button class="nav-link w-100" id="additional-information" data-bs-toggle="tab" data-bs-target="#bordered-justified-additional-information" type="button" role="tab" aria-controls="additional-information" aria-selected="false">Additional Information</button>
          </li>
        </ul>

        <div class="tab-content py-4">
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

                  <!-- CONTACT NUMBER AND EMAIL ADDRESS -->
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
                </form><!-- End Custom Styled Validation with Tooltips -->
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="bordered-justified-educational-background" role="tabpanel" aria-labelledby="educational-background">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Educational Background</h5>
                <!-- Custom Styled Validation with Tooltips -->
                <form class="row g-4 needs-validation" novalidate>
                  
                </form><!-- End Custom Styled Validation with Tooltips -->
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="bordered-justified-family-background" role="tabpanel" aria-labelledby="family-background">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Family Background</h5>
                <!-- Custom Styled Validation with Tooltips -->
                <form class="row g-4 needs-validation" novalidate>
                  <!-- FAMILY BACKGROUND -->
                  <!-- ... -->
                </form><!-- End Custom Styled Validation with Tooltips -->
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="bordered-justified-additional-information" role="tabpanel" aria-labelledby="additional-information">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Additional Information</h5>
                <!-- Custom Styled Validation with Tooltips -->
                <form class="row g-4 needs-validation" novalidate>
                  <!-- ADDITIONAL INFORMATION -->
                  <!-- ... -->
                </form><!-- End Custom Styled Validation with Tooltips -->
              </div>
            </div>
          </div>
        </div>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-between align-items-center ">
          <button id="profile_save" class="btn btn-md btn-danger shadow-sm">
            <i class="fas fa-question fa-sm text-white-50 mr-2"></i> Save Profile
          </button>
          <nav aria-label="pagination">
            <ul class="pagination" id="borderedTabJustifiedPagination">
              <li class="page-item"><a class="page-link" href="#bordered-justified-personal-information" data-bs-slide-to="0">Pages</a></li>
              <li class="page-item"><a class="page-link" href="#bordered-justified-personal-information" data-bs-slide-to="0">1</a></li>
              <li class="page-item"><a class="page-link" href="#bordered-justified-educational-background" data-bs-slide-to="1">2</a></li>
              <li class="page-item"><a class="page-link" href="#bordered-justified-family-background" data-bs-slide-to="2">3</a></li>
              <li class="page-item"><a class="page-link" href="#bordered-justified-additional-information" data-bs-slide-to="3">4</a></li>
              <!-- <li class="page-item"><a class="page-link" href="#" data-bs-slide-to="1">Next</a></li> -->
            </ul>
          </nav><!-- End Basic Pagination -->
      </div>
    </div>
    <script>
      // Get the pagination and tabs elements
      const pagination = document.getElementById('borderedTabJustifiedPagination');
      const tabs = document.getElementById('borderedTabJustified');

      // Add click event listeners to pagination links
      const paginationLinks = pagination.getElementsByTagName('a');
      for (let i = 0; i < paginationLinks.length; i++) {
        paginationLinks[i].addEventListener('click', function(event) {
          event.preventDefault(); // Prevent the default link behavior

          // Get the target tab ID from the href attribute
          const targetTabId = this.getAttribute('href');
          const targetTab = document.querySelector(targetTabId);

          // Activate the target tab
          const tabTrigger = tabs.querySelector(`[data-bs-target="${targetTabId}"]`);
          const tabTriggers = tabs.getElementsByClassName('nav-link');
          for (let j = 0; j < tabTriggers.length; j++) {
            tabTriggers[j].classList.remove('active');
          }
          tabTrigger.classList.add('active');

          // Show the target tab and hide other tabs
          const tabContents = document.getElementsByClassName('tab-pane');
          for (let k = 0; k < tabContents.length; k++) {
            tabContents[k].classList.remove('show', 'active');
          }
          targetTab.classList.add('show', 'active');
        });
      }
    </script>
  </section>
</main><!-- End #main -->
