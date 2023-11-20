  <main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle d-none">
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
            <input type="hidden" id="userId" value="<?= $_SESSION['id'] ?>">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
              <label class="-label" for="file">
                <span class="glyphicon glyphicon-camera"></span>
                <span>Change Image</span>
              </label>
              <input id="file" type="file" onchange="loadFile(event)" />
              <img id="output" src="<?= $user_info['fbImage'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['fbImage'] ?>" alt="Profile" class="rounded-pill">
              <h2><?= $user_info['first_name'] . " " . $user_info['last_name'] ?></h2>
              <h3><?= $accType ?></h3>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title pt-4 d-flex flex-column align-items-center"> ADMIN PROFILE</h5>

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
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control" id="userName" aria-describedby="userName" value="<?= $user_data[1] ?>" name="Username">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="firstName" class="form-label">First name</label>
                        <input type="text" class="form-control" id="firstName" aria-describedby="firstName" value="<?= $user_info['first_name'] ?>" name="First Name">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="middleName" class="form-label">Middle name</label>
                        <input type="text" class="form-control" id="middleName" aria-describedby="middleName" value="<?= $user_info['middle_name'] ?>">
                      </div>
                      <div class="col-md-3 position-relative">
                        <label for="lastName" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="lastName" aria-describedby="lastName" value="<?= $user_info['last_name'] ?>" name="Last Name">
                      </div>
                    </form><!-- End Custom Styled Validation with Tooltips -->
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Contact Information</h5>
                    <!-- Custom Styled Validation with Tooltips -->
                    <div class="row g-4">
                      <!-- CONTACT INFORMATION -->
                      <div class="col-md-5 position-relative">
                        <label for="telephone" class="form-label">Contact Number</label>
                        <div class="input-group">
                          <span class="input-group-text" id="inputGroupPrepend2">+63</span>
                          <input type="telephone" class="form-control" id="telephone" aria-describedby="inputGroupPrepend2" value="<?= substr($user_info['contact_number'], 2) ?>" name="Contact Number">
                        </div>
                      </div>
                      <div class="col-md-7 position-relative">
                        <label for="emailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="emailAddress" aria-describedby="emailAddress" value="<?= $user_data[2] ?>" name="Email Address">
                      </div>
                    </div><!-- End Custom Styled Validation with Tooltips -->
                  </div>
                </div>
                <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                  <button type="button" class="btn btn-outline-success" id="saveAdminProfile">Save Profile</button>
                </div>
              </div>
            </div>
            <!-- End Bordered Tabs Justified -->
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->