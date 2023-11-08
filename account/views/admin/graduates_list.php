<main id="main" class="main">
  <!-- Start of Page Title -->
  <div class="pagetitle">
    <h1>Graduated List</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Graduates</li>
      <li class="breadcrumb-item active">Graduated List</li>
    </ol>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <div class="column">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="card-title">Query Filter</h5>
              <div class="d-flex align-items-center">
                <button id="resetSchoolFilter" class="btn btn-sm btn-danger shadow-sm">Reset Filter</button>
              </div>
            </div>
            <!-- Filter options -->
            <div class="row mb-1 justify-content-between">
              <div class="column position-relative">
                <div class="row mb-3">
                  <label for="filterSchool" class="col-sm-2 col-form-label">School Name: </label>
                  <div class="col-sm-10" id="">
                    <select class="form-select" id="filterSchool">

                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="filterSchoolType" class="col-sm-2 col-form-label font-bold">School Type: </label>
                  <div class="col-sm-10">
                    <select class="form-select" id="filterSchoolType">

                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="filterClass" class="col-sm-2 col-form-label font-bold">School Class Type: </label>
                  <div class="col-sm-10">
                    <select class="form-select" id="filterClass">

                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="filterLevel" class="col-sm-2 col-form-label font-bold">School Year Level: </label>
                  <div class="col-sm-10">
                    <select class="form-select" id="filterLevel">

                    </select>
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="filterYear" class="col-sm-2 col-form-label font-bold">Year Graduated: </label>
                  <div class="col-sm-10">
                    <select class="form-select" id="filterYear">
                      <option value=""></option>
                      <?php for ($i = date("Y"); $i <= date("Y") + 5; $i++) : ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>

                <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                  <button type="button" id="setSchoolFilter" class="btn btn-sm btn-danger shadow-sm">Set Query Filter </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="column">
      <div class="col-lg-15">
        <div class="card">
          <div class="card-body ">
            <div class="table-responsive">
              <h5 class="card-title">LIST OF GRADUATES</h5>
              <!-- Table with stripped rows -->
              <table id="graduatesTable" class="table table-striped" width="200%" cellspacing="200%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>User Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Extension Name</th>
                    <th>Email Address</th>
                    <th>School</th>
                    <th>School Type</th>
                    <th>Educational Level</th>
                    <th>Year Level</th>
                    <th>Course/Strand</th>
                    <th>Year Graduated</th>
                    <th class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->