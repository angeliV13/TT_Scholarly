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
                                <button id="editExamTotal" class="btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Edit Total Items
                                </button>
                            </div>
                        </div>
                        <div id="totalItems" class="row mb-4 py-2">
                            <div class="col-sm-6 row position-relative">
                                <!-- English -->

                                <label for="inputEnglish" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">English</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputEnglish" class="form-control" disabled>
                                </div>

                            </div>
                            <div class="col-sm-6 row position-relative">
                                <!-- Mathematics -->

                                <label for="inputMath" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">Mathematics</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputMath" class="form-control" disabled>
                                </div>

                            </div>
                            <div class="col-sm-6 row position-relative">
                                <!-- General Information -->

                                <label for="inputGenInfo" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">General Information</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputGenInfo" class="form-control" disabled>
                                </div>

                            </div>
                            <div class="col-sm-6 row position-relative">
                                <!-- Abstract Reasoning -->

                                <label for="inputAbstract" class="col-sm-4 col-form-label">
                                    <h6 class="font-bold">Abstract Reasoning</h6>
                                </label>
                                <div class="col-sm-2">
                                    <input type="number" id="inputAbstract" class="form-control" disabled>
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
                        <button class="btn btn-sm btn-danger shadow-sm" data-bs-toggle="modal" data-bs-target="#add_question_modal">
                            <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Question
                        </button>
                    </div>
                    <div id="examination_questions" data-mdb-max-height="460" data-mdb-fixed-header="true">
                        <table id="examQuestionsTable" class="table table-bordered table-condensed table-striped">
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
    <!-- Add Exam Item Modal -->
    <div class="modal fade" id="add_question_modal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Exam Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <div class="col-sm-3">
                            <p>Category</p>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioAddCategory" id="radioAddEnglish" value="1">
                                <label class="form-check-label" for="radioAddEnglish">
                                    English
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioAddCategory" id="radioAddMath" value="2">
                                <label class="form-check-label" for="radioAddMath">
                                    Mathematics
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioAddCategory" id="radioAddGenInfo" value="3">
                                <label class="form-check-label" for="radioAddGenInfo">
                                    General Information
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radioAddCategory" id="radioAddAbstract" value="4">
                                <label class="form-check-label" for="radioAddAbstract">
                                    Abstract Reasoning
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="examAddQuestion" class="form-label col-3">Question</label>
                        <textarea class="form-control col" rows="2" id="examAddQuestion" aria-describedby="examAddQuestion" name="examAddQuestion">
                        </textarea>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="examAddChoices" class="form-label col-3">Choices</label>
                        <textarea class="form-control col" rows="3" id="examAddChoices" aria-describedby="examAddChoices" name="examAddChoices">

                        </textarea>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="examAddAnswer" class="form-label col-3">Answer</label>
                        <select class="form-select col" id="examAddAnswer" aria-label="Default select example">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="addQuestion">Add Question</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</main>