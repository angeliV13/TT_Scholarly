
<script src="assets/js/header.js"></script>

<?php
switch($_SESSION['account_type']){
    case 0:     //Super Admin
        echo '<script src="assets/js/basic_setup.js"></script>';

    case 1:     //Admin
        echo '<script src="assets/js/basic_setup.js"></script>';

    case 2:
        echo '<script src="assets/js/upload_assessment.js"></script>';
        
    case 3:
        echo '<script src="assets/js/upload_assessment.js"></script>';
}
?>