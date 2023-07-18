<main id="main" class="main">
    <section class="section">
        <div class="column">
            <div class="col-lg-30">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Filter Settings</h5>
                            <div class="d-flex align-items-center">
                                <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Set Filter
                                </button>
                            </div>
                        </div>
                        <div class="row mb-4 py-2 justify-content-between">
                            <form class="row position-relative">
                                <!-- Filter options -->
                                <!-- Academic Year -->
                                <label for="inputAcadYear" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Academic Year:</h6>
                                </label>
                                <div class="col-sm-4">
                                    <select class="form-select" id="inputAcadYear">
                                        <option selected disabled value="">Choose</option>
                                        <option>2023-2024</option>
                                        <option>2023-2024</option>
                                        <option>2023-2024</option>
                                        <option>2023-2024</option>
                                        <option>2023-2024</option>
                                    </select>
                                </div>

                                <!-- Scholarship Type -->
                                <label for="inputScholarType" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Scholarship Type:</h6>
                                </label>
                                <div class="col-sm-4" id="">
                                    <select class="form-select" id="inputScholarType">
                                        <option selected disabled value="">Choose</option>
                                        <option>Educational Assistance Program</option>
                                        <option>Full Scholarship Program</option>
                                    </select>
                                </div>

                                <!-- Education Level -->
                                <label for="inputEducationLevel" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Education Level:</h6>
                                </label>
                                <div class="col-sm-4 mt-4">
                                    <select class="form-select" id="inputEducationLevel">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College</option>
                                    </select>
                                </div>

                                <label for="inputSchool" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Name of School</h6>
                                </label>
                                <div class="col-sm-4 mt-4">
                                    <select class="form-select" id="inputSchool" onchange="updateYearLevelOptions()">
                                        <option selected disabled value="">Choose</option>
                                        <option>BSU</option>
                                        <option>FAITH</option>
                                    </select>
                                </div>

                                <!-- Year Level -->
                                <label for="inputYearLevel" class="mt-4 col-sm-2 col-form-label">
                                    <h6 class="font-bold">Year Level:</h6>
                                </label>
                                <div  id="yearLevelContainer" class="col-sm-4 mt-4" >
                                    <select class="form-select" id="inputYearLevel" >
                                        <option selected disabled value="">Choose</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- TABLE-->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Senior High School</h5>
                    <div class="d-flex align-items-center">
                        <div class="input-group mr-3">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search">
                            <button class="btn btn-danger" type="button" id="searchButton">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <a class="collapsed mx-3" data-bs-target="#college_table_view" data-bs-toggle="collapse" href="#">
                            <i class="bi bi-chevron-down ms-auto"></i>
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="applicantListTable" class="table table-striped" width="250%" cellspacing="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name(LN, FN, MN)</th>
                                <th>Educational Level</th>
                                <th>Course</th>
                                <th>Year Level</th>
                                <th>School</th>
                                <th>School Type</th>
                                <th>Scholarship Type</th>
                                <th>Contact No.</th>
                                <th>Home Address</th>
                                <th>Action</th>
                            </tr>
                            <!-- <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> -->
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Biscocho, Val Juniel Mendoza</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$3,120</td>
                                <td>$3,120</td>
                                <td>$3,120</td>
                                <td>$3,120</td>
                                <td>$3,120</td>
                                <td>
                                    <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                        <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#assessment_edit_modal">Edit</button>
                                        <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="#assessment_delete_modal">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Reyes, Angeli Mallillin</td>
                                <td>Edinburgh</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$5,300</td>
                                <td>$3,120</td>
                                <td>$3,120</td>
                                <td>$3,120</td>
                                <td>$3,120</td>
                                <td>
                                    <div class="row mx-auto"> <!--style="height:100px;width:200px" > -->
                                        <button class="col-6 btn btn-warning" data-bs-toggle="modal" data-bs-target="#assessment_edit_modal">Edit</button>
                                        <button class="col-6 btn btn-danger" data-bs-toggle="modal" data-bs-target="#assessment_delete_modal">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>