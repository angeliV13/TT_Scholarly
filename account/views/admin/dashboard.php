  <main id="main" class="main">

    <!-- Start of Page Title -->
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Applicants</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="totalApplicants"></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Beneficiaries</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="totalBeneficiaries"></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Graduating</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="totalGraduating"></h6>
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Scholar Trends</h5>

                  <!-- Line Chart -->
                  <div id="scholarTrends"></div>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Exam Scopes -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Examination Scopes</span></h5>

                  <!-- Examination Scope -->
                  <div id="totalItems" class="row mb-4 py-2">
                    <div class="col-sm-6 row position-relative">
                      <!-- English -->

                      <label for="inputEnglish" class="col-sm-6 col-form-label">
                        <h6 class="font-bold">English</h6>
                      </label>
                      <div class="col-sm-4">
                        <input type="number" id="inputEnglish" class="form-control" disabled>
                      </div>

                    </div>
                    <div class="col-sm-6 row position-relative">
                      <!-- Mathematics -->

                      <label for="inputMath" class="col-sm-6 col-form-label">
                        <h6 class="font-bold">Mathematics</h6>
                      </label>
                      <div class="col-sm-4">
                        <input type="number" id="inputMath" class="form-control" disabled>
                      </div>

                    </div>
                    <div class="col-sm-6 row position-relative">
                      <!-- General Information -->

                      <label for="inputGenInfo" class="col-sm-6 col-form-label">
                        <h6 class="font-bold">General Information</h6>
                      </label>
                      <div class="col-sm-4">
                        <input type="number" id="inputGenInfo" class="form-control" disabled>
                      </div>

                    </div>
                    <div class="col-sm-6 row position-relative">
                      <!-- Abstract Reasoning -->

                      <label for="inputAbstract" class="col-sm-6 col-form-label">
                        <h6 class="font-bold">Abstract Reasoning</h6>
                      </label>
                      <div class="col-sm-4">
                        <input type="number" id="inputAbstract" class="form-control" disabled>
                      </div>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- Exam Scopes -->

            <!-- Barangay Chart -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">Barangay Trends</h5>

                  <!-- Line Chart -->
                  <div id="scholarTrendsV3"></div>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- Barangay Chart -->

            <!-- School Chart -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="card-body">
                  <h5 class="card-title">School Trends</h5>

                  <!-- Bar Chart -->
                  <div id="scholarTrendsV5"></div>
                  <!-- End bar Chart -->

                </div>

              </div>
            </div><!-- School Chart -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Reports Card -->
          <!-- <div class="card info-card sales-card">

            <div class="card-body">
              <h5 class="card-title">Reports</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-bar-chart-fill"></i>
                </div>
                <div class="ps-3">
                  <h6 id="totalReports">Generate</h6>
                </div>
              </div>
            </div>

          </div> -->
          <!-- End Reports Card -->

          <!-- Recent Activity -->
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity" id="activity">

              </div>

            </div>
          </div><!-- End Recent Activity -->

          <!-- Application Trends -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Application Trends</h5>

              <div id="applicantTrends" style="min-height: 400px;" class="echart"></div>

            </div>
          </div><!-- End Application Trends -->

          <!-- Gender Trends -->
          <div class="card">

            <div class="card-body pb-0">
              <h5 class="card-title">Gender Trends</h5>

              <div id="genderTrends" style="min-height: 400px;" class="echart"></div>

            </div>
          </div><!-- End Gender Trends -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->