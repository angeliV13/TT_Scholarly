

<script src="assets/js/header.js"></script>
<script src="assets/js/editProfile.js"></script>


<?php
switch($_SESSION['account_type'])
{
    case 0:     //Super Admin
        echo '<script src="assets/js/basic_setup.js"></script>';
        echo '<script src="assets/js/applicantList.js"></script>';
        echo '<script src="assets/js/updateYearLevelOptions.js"></script>';
        echo '<script src="assets/js/exam_settings.js"></script>';
        break;
    case 1:     //Admin
        echo '<script src="assets/js/basic_setup.js"></script>';
        echo '<script src="assets/js/applicantList.js"></script>';
        echo '<script src="assets/js/updateYearLevelOptions.js"></script>';
        echo '<script src="assets/js/exam_settings.js"></script>';
        break;
    case 2:     // Beneficiaries
        echo '<script src="assets/js/upload_assessment.js"></script>';
        break;
    case 3:     // Applicant
        echo '<script src="assets/js/upload_assessment.js"></script>';
        break;
}
?>



