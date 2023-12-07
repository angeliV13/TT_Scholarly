<main id="main" class="main">
  <!-- Start of Page Title -->
  <div class="pagetitle">
    <h1>Graduating List</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Graduates</li>
      <li class="breadcrumb-item active">Graduating List</li>
    </ol>
  </div>
  <!-- End Page Title -->
  <section class="section">
    <!-- QUERY OPTION -->
    <div class="column">
        <div class="col-lg-12">
            <?php include("views/admin/filter.php"); ?>
        </div>
    </div>
    <div class="card">
      <div class="card-body ">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="card-title">Graduating List</h5>
          <button class="btn btn-sm btn-danger" onclick="printData('graduatingTable')"> <i class="bi bi-printer"></i> Print List </button>
          <!-- <button class="dt-button buttons-print btn btn-sm btn-danger" tabindex="0" aria-controls="collegeNewApplicantTable" type="button"><span>Print</span></button> -->
        </div>
        <div class="table-responsive">
          <!-- Table with stripped rows -->
          <table id="graduatingTable" class="table table-striped" width="200%" cellspacing="200%">
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
  </section>

</main><!-- End #main -->