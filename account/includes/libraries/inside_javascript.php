

<script src="assets/js/header.js"></script>
<script src="assets/js/editProfile.js"></script>


<?php
switch($_SESSION['account_type'])
{
    case 0:     //Super Admin
        echo '<script src="assets/js/basic_setup.js"></script>';
        echo '<script src="assets/js/applicantList.js"></script>';
        echo '<script src="assets/js/notifSettings.js"></script>';
        echo '<script src="assets/js/updateYearLevelOptions.js"></script>';
        echo '<script src="assets/js/exam_settings.js"></script>';
        echo '<script src="assets/js/accountList.js"></script>';
        break;
    case 1:     //Admin
        echo '<script src="assets/js/basic_setup.js"></script>';
        echo '<script src="assets/js/applicantList.js"></script>';
        echo '<script src="assets/js/updateYearLevelOptions.js"></script>';
        echo '<script src="assets/js/exam_settings.js"></script>';
        echo '<script src="assets/js/notifSettings.js"></script>';
        echo '<script src="assets/js/schoolSettings.js"></script>';
        echo '<script src="assets/js/websiteManagement.js"></script>';
        echo '<script src="assets/js/accountList.js"></script>';
        break;
    case 2:     // Beneficiaries
        echo '<script src="assets/js/upload_assessment.js"></script>';
        echo '<script src="assets/js/accountManagement.js"></script>';
        break;
    case 3:     // Applicant
        echo '<script src="assets/js/upload_assessment.js"></script>';
        echo '<script src="assets/js/accountManagement.js"></script>';
        echo '<script src="assets/js/startExam.js"></script>';
        if(isset($_GET['nav'])){
            if($_GET['nav'] == 'examination_proper'){
                echo '<script src="assets/js/examination_proper.js"></script>';
            }
        }
        break;
}
?>



