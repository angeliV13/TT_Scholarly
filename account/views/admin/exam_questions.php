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
        <div class="col-lg-60">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">General Information Questions</h5>
                        <div class="d-flex align-items-center">
                            <a class="collapsed mx-5" data-bs-target="#examination_questions" data-bs-toggle="collapse"
                                href="#">
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </a>
                        </div>
                    </div>
                    <div id="examination_questions" data-mdb-max-height="460" data-mdb-fixed-header="true">
                        <table id="examQuestionsTable" class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No.</th>
                                    <th>Question</th>
                                    <!-- <th >Answer Options</th> -->
                                    <!-- <th>Correct Answer</th>
                                    <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Filipina Lea Salonga has supplied the singing voice of two Disney princesses --
                                        Mulan in 1998, and what princess who discovered "A Whole New World" in 1992's
                                        "Aladdin?"</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </section>
</main>