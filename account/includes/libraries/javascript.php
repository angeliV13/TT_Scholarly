  <!-- JQuery and Sweet Alert -->
  <script src="assets/vendor/jquery/jquery-3.7.0.js" crossorigin="anonymous"></script>
  <script src="assets/vendor/sweet-alert/sweetalert2.js" crossorigin="anonymous"></script>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <!-- <script src="assets/vendor/simple-datatables/simple-datatables.js"></script> -->

  <!-- DataTables -->
  <script src="assets/vendor/datatables/js/dataTables.jquery.min.js"></script>

  <!-- PRINTING FROM DATA TABLES -->
  <script src="assets/vendor/datatables/js/dataTables.buttons.min.js"></script>
  <script src="assets/vendor/jquery/jszip.min.js"></script>
  <script src="assets/vendor/jquery/pdfmake.min.js"></script>
  <script src="assets/vendor/jquery/vfs_fonts.min.js"></script>
  <script src="assets/vendor/datatables/js/buttons.html5.min.js"></script>
  <script src="assets/vendor/datatables/js/dataTables.buttons.print.min.js"></script>


  <!-- Vendor JS Files 2 -->
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/sidebar.js"></script>

  <!-- Locations -->
  <script src="assets/js/locations.js"></script>


  <!-- Functions -->
  <script src="assets/js/functions.js"></script>

  <!-- Calendar -->
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

  <script>
    $(document).ready(function (){
      let pageTitle = $(".pagetitle").find("h1").text();
      let mainTitle = "<?= $website_info['header'] ?>";
      
      document.title = pageTitle + " | " + mainTitle;
    });
  </script>



