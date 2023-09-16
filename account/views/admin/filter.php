<!-- Filter -->
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title">Query Filter</h5>
            <div class="d-flex align-items-center">
                <button id="filter_reset" class="btn btn-sm btn-danger shadow-sm">Reset Filter</button>
            </div>
        </div>
        <!-- Filter options -->
        <div class="row mb-1 justify-content-between">
            <form id="filterScholar" class="column position-relative">

                <!-- Scholarship Type -->
                <div class="row mb-3">
                    <label for="filterScholarType" class="col-sm-2 col-form-label">Scholarship Type:</label>
                    <div class="col-sm-10" id="">
                        <select class="form-select" id="filterScholarType">

                        </select>
                    </div>
                </div>

                <!-- Education Level -->
                <div class="row mb-3">
                    <label for="filterEducationLevel" class="col-sm-2 col-form-label font-bold">Educational Level:</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="filterEducationLevel">

                        </select>
                    </div>
                </div>

                <!-- School Name -->
                <div class="row mb-3">
                    <label for="filterSchool" class="col-sm-2 col-form-label font-bold">School Name:</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="filterSchool">

                        </select>
                    </div>
                </div>

                <!-- Year Level -->
                <div class="row mb-3">
                    <label for="filterYearLevel" class="col-sm-2 col-form-label font-bold">Year Level:</label>
                    <div id="yearLevelContainer" class="col-sm-10">
                        <select class="form-select" id="filterYearLevel">

                        </select>
                    </div>
                </div>
                <div class="d-grid pt-3 gap-2 d-flex justify-content-end">
                    <button id="setFilter" class="btn btn-sm btn-danger shadow-sm">Set Query Filter </button>
                </div>
            </form>
        </div>
    </div>
</div>