<?php

//Link Checker and Registration
function get_path($lv_path){
    switch ($lv_path){
        case 'dashboard':
            return 'dashboard.php';

        case 'pages-contact':
                return 'pages-contact.html';

        case 'new-applicants':
                return 'views/admin/new-applicants.php';
        case 'interview':
                return 'views/admin/interview.php';

        case 'assessment':
                return 'views/admin/assessment.php';

        case 'examination':
                return 'views/admin/examination.php';

        case 'removed-applicants':
                return 'views/admin/removed-applicants.php';

        case 'beneficiaries':
                return 'views/admin/beneficiaries.php';

        case 'bene-assessment':
                return 'views/admin/bene-assessment.php';

        case 'bene-renewal':
                return 'views/admin/bene-renewal.php';
        
        case 'removed-bene':
                return 'views/admin/removed-bene.php';

        case 'graduates':
                return 'views/admin/graduates.php';

        case 'graduating':
                return 'views/admin/graduating.php';

        case 'Adaccount-management':
                    return 'views/admin/Adaccount-management.php';

        case 'admin-profile':
                return 'views/admin/admin-profile.php';

        case 'assessment-bene':
                return 'views/beneficiaries/assessment-bene.php';

        case 'profile-bene':
                return 'views/beneficiaries/profile-bene.php';

        case 'renewal-bene':
                return 'views/beneficiaries/renewal-bene.php';

        default:
            return 'error.html';
    }

}

?>