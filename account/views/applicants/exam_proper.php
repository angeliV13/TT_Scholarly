<main id="main" class="main">
  <!-- Start of Page Title -->
  <div class="pagetitle d-none">
    <h1>Examination</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item">Applicants</li>
      <li class="breadcrumb-item active">Examination</li>
    </ol>
  </div>
  <div class="timer-top d-flex align-items-center justify-content-center active">
    <p id="time" class="mt-3">
      <?php echo (isset($examAccess[2]) ? $examAccess[2] : "00:00:00"); ?>
    </p>
  </div>
  <!-- End Page Title -->

  <div class="card">

    <form id="exam_container" class="prevent-select" method="post">

    </form>

  </div>

  <!-- Instructions Modal -->
  <div class="modal fade" id="instructionsModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">General Directions / Instructions</h5>
        </div>
        <div class="modal-body">
          <!-- DECLARATION OF ACCURACY -->
          <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
            Welcome to the scholarship examination. Please carefully read and follow the instructions below:
          </h6>
          <p class="small pb-3" style="text-align: justify;">
            Please answer the all the examinations
          </p>

          <!-- AUTHORIZATION -->
          <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
              Time limit:
          </h6>
          <p class="small pb-3" style="text-align: justify;">
            The time limit is posted on the top right portion of the screen. 
            In 1 minute, it will prompt that you are near the deadline
            By reaching the deadline, your answers will be auto submitted.
          </p>

          <!-- Information Sourcing -->
          <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
              Leaving:
          </h6>
          <p class="small pb-3" style="text-align: justify;">
            Leaving the examination will marked you as finished.
          </p>
          <h6 class="fw-bold" style="font-size: 20px; color: #010483;"><i class="bi bi-shield-lock-fill" style></i> <span style="margin: 2px;">
              Good luck!
          </h6>
        </div>
        <div class="modal-footer">
          <button id="start_exam" type="button" class="btn btn-warning">Start Exam</button>
          <button id="cancel_exam" type="button" class="btn btn-secondary">Cancel</button>
        </div>
      </div>
    </div>
  </div>

</main><!-- End #main -->