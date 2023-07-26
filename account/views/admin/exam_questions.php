<main id="main" class="main">
    <!-- Start of Page Title -->
  <div class="pagetitle">
      <h1>Examination Questions</h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Examination</li>
          <li class="breadcrumb-item active">Examination Questions</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-30">
                <!-- Academic Year -->
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Examination Scope</h5>
                            <div class="d-flex align-items-center">
                                <button id="save_exam_item" class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Set Items
                                </button>
                            </div>
                        </div>
                        <div class="row mb-4 py-2">
                            <div class="col-sm-6 row position-relative">
                                <!-- English -->

                                <label for="inputEnglish" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">English</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputEnglish" class="form-control">
                                </div>

                            </div>
                            <div class="col-sm-6 row position-relative">
                                <!-- Mathematics -->

                                <label for="inputMath" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">Mathematics</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputMath" class="form-control">
                                </div>

                            </div>
                            <div class="col-sm-6 row position-relative">
                                <!-- General Information -->

                                <label for="inputGenInfo" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">General Information</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputGenInfo" class="form-control">
                                </div>

                            </div>
                            <div class="col-sm-6 row position-relative">
                                <!-- Abstract Reasoning -->

                                <label for="inputAbstract" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">Abstract Reasoning</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputAbstract" class="form-control">
                                </div>

                            </div>
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
                        <h5 class="card-title">Questions</h5>
                        <button id="save_exam_item" class="btn btn-sm btn-danger shadow-sm">
                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Question
                        </button>
                    </div>
                    <div id="examination_questions" data-mdb-max-height="460" data-mdb-fixed-header="true">
                        <table id="examQuestionsTable" class="table table-striped">
                            <thead>
                                <tr class="">
                                    <th>No.</th>
                                    <th>Category</th>
                                    <th class="col-sm-6">Question</th>
                                    <th>Answer Options</th>
                                    <th>Correct Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="small">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>