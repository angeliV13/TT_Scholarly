<main id="main" class="main">
    <section class="section">
        <div class="column">
            <div class="col-lg-30">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Qualification Exam Filter</h5>
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
                                    <select class="form-select" id="inputEducationLevel" onchange="updateYearLevelOptions()">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College</option>
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

                                <label for="inputEducationLevel" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Name of School:</h6>
                                </label>
                                <div class="col-sm-10 mt-4">
                                    <select class="form-select" id="inputEducationLevel">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TABLE-->
        <div class="column">
            <div class="col-lg-30">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Examination Settings</h5>
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
                                    <h6 class="font-bold">Type of Examination:</h6>
                                </label>
                                <div class="col-sm-4">
                                    <checkbox class="form-select" id="inputAcadYear">
                                        <option selected disabled value="">Choose</option>
                                        <option>Multiple Choice</option>
                                        <option>Identification</option>
                                        <option>Modified</option>
                                        <option>2023-2024</option>
                                        <option>2023-2024</option>
                                    </checkbox>
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
                                    <select class="form-select" id="inputEducationLevel" onchange="updateYearLevelOptions()">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College</option>
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

                                <label for="inputEducationLevel" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Name of School:</h6>
                                </label>
                                <div class="col-sm-10 mt-4">
                                    <select class="form-select" id="inputEducationLevel">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College</option>
                                    </select>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>