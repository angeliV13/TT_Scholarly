<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Generate Report</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Report</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
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

                    <!--  Applicant Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Applicant Data</h5>
                                    <div class="d-flex align-items-center">
                                        <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Data
                                        </button>
                                        <a class="collapsed mx-3" data-bs-target="#generate_report" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="generate_report" class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- End Reports -->

                    <!--  Beneficiaries Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">Beneficiaries Data</h5>
                                    <div class="d-flex align-items-center">
                                        <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Generate Data
                                        </button>
                                        <a class="collapsed mx-3" data-bs-target="#generate_report" data-bs-toggle="collapse" href="#">
                                            <i class="bi bi-chevron-down ms-auto"></i>
                                        </a>
                                    </div>
                                </div>
                                <div id="generate_report" class="card-body">
                                </div>
                            </div>
                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">
                            <div class="card-body">
                                <h5 class="card-title">Top Scorers</span></h5>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Customer</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><a href="#">#2457</a></th>
                                            <td>Brandon Jacob</td>
                                            <td><a href="#" class="text-primary">At praesentium minu</a></td>
                                            <td>$64</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2147</a></th>
                                            <td>Bridie Kessler</td>
                                            <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                            <td>$47</td>
                                            <td><span class="badge bg-warning">Pending</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2049</a></th>
                                            <td>Ashleigh Langosh</td>
                                            <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                            <td>$147</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Angus Grady</td>
                                            <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                            <td>$67</td>
                                            <td><span class="badge bg-danger">Rejected</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">#2644</a></th>
                                            <td>Raheem Lehner</td>
                                            <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                            <td>$165</td>
                                            <td><span class="badge bg-success">Approved</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div>
        </div>
    </section?>
</main><!-- End #main -->