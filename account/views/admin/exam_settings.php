<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Beneficiaries</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Examiantion</li>
            <li class="breadcrumb-item active">List of Examinees</li>
        </ol>
    </div>
    <section class="section">
        <div class="column">
            <div class="col-lg-30">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Examination Settings</h5>
                            
                        </div>
                        <div class="row mb-4 py-2 justify-content-between">
                            <form class="row position-relative">
                                <!-- Filter options -->
                                <!-- Academic Year -->
                                <label for="inputExaminationType" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Type of Examination:</h6>
                                </label>
                                <div class="col-sm-4">
                                    <select class="form-select" id="inputExaminationType">
                                        <option selected disabled value="">Choose</option>
                                        <option>Multiple Choice</option>
                                        <option>Identification</option>
                                        <option>Modified True or False </option>
                                    </select>
                                </div>

                                <!-- No. of Items  -->
                                <label for="inputTotalItems" class="col-sm-2 col-form-label">
                                    <h6 class="font-bold">Total of Items:</h6>
                                </label>
                                <div class="col-sm-4" id="">
                                    <select class="form-select" id="inputTotalItems">
                                        <option selected disabled value="">Choose</option>
                                        <option>50</option>
                                        <option>100</option>
                                    </select>
                                </div>

                                <!-- Education Level -->
                                <label for="inputEducationLevel" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Time Duration:</h6>
                                </label>
                                <div class="col-sm-4 mt-4">
                                    <select class="form-select" id="inputEducationLevel">
                                        <option selected disabled value="">Choose</option>
                                        <option>Senior High School</option>
                                        <option>College</option>
                                    </select>
                                </div>

                                <label for="inputSchool" class="col-sm-2 col-form-label mt-4">
                                    <h6 class="font-bold">Passing Type</h6>
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

                        <div class="d-flex float-end">
                            <button id="generate_ay" class="btn btn-sm btn-danger shadow-sm">
                                <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Edit Exam Settings
                            </button>
                            
                        </div>
                        <div class="d-flex float-end ">
                            <button id="generate_ay" class="btn btn-sm btn-warning shadow-sm">
                                <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Save 
                            </button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>