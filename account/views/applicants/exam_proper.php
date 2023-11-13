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
      <?php echo (isset($examAccess[2]) ? $examAccess[2] : "00:00:00" ); ?>
    </p>
  </div>
  <!-- End Page Title -->

  <div class="card">

    <form id="exam_container" class="prevent-select">
      
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
                    
                </div>
                <div class="modal-footer">
                    <button id="start_exam" type="button" class="btn btn-warning">Start Exam</button>
                    <button id="cancel_exam" type="button" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </div>
  
</main><!-- End #main -->