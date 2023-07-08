<?php

//Link Checker and Registration
function get_path($lv_path, $type = '99')
{
        if ($type == 0)         //Admin
        {
                switch ($lv_path) 
                {
                        case 'dashboard':
                                return 'views/admin/dashboard.php';
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
                        
                        case 'app-profile':
                                return 'views/applicants/app-profile.php';
                        
                        case 'applicants':
                                return 'views/sidebar/applicants.html';
                        default:
                                return 'error.html';
                }
        }

        if ($type == 1)         //Admin
        {
                switch ($lv_path) 
                {
                        case 'dashboard':
                                return 'views/admin/dashboard.php';
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
                        
                        case 'app-profile':
                                return 'views/applicants/app-profile.php';
                        
                        case 'applicants':
                                return 'views/sidebar/applicants.html';
                        default:
                                return 'error.html';
                }
        }
        elseif ($type == 2)     //Beneficiaries        
        {
                switch($lv_path)
                {
                        case 'dashboard':
                                return 'views/beneficiaries/dashboard.php';
                        case 'assessment-bene':
                                return 'views/beneficiaries/assessment-bene.php';

                        case 'profile-bene':
                                return 'views/beneficiaries/profile-bene.php';

                        case 'renewal-bene':
                                return 'views/beneficiaries/renewal-bene.php';
                        
                        case 'app-profile':
                                return 'views/applicants/app-profile.php';
                        
                        case 'applicants':
                                return 'views/sidebar/applicants.html';

                        default:
                                return 'error.html';
                }
        }

        elseif ($type == 3)     //Applicant
        {
                switch($lv_path)
                {
                        case 'dashboard':
                                return 'views/beneficiaries/dashboard.php';
                        case 'assessment-bene':
                                return 'views/beneficiaries/assessment-bene.php';

                        case 'profile-appl':
                                return 'views/beneficiaries/profile-appl.php';

                        case 'examination':
                                return 'views/beneficiaries/examination.php';

                        default:
                                return 'error.html';
                }
        }
}

function get_sidebar($type, $access_level = 0)
{
        switch($type)
        {
                case 0:
                        return 'views/sidebar/super_admin.html';
                case 1:
                        if($access_level == 1){
                                return 'views/sidebar/semi_super_admin.html';
                        }else{
                                return 'views/sidebar/admin.html';   
                        }
                        
                case 2:
                        return 'views/sidebar/bene.html';
                case 3:
                        return 'views/sidebar/applicants.html';
        }
}

function get_title($page = 'NA')
{
        switch($page)
        {
                case 0:
                        return 'Login | Thrive Thomasino Scholarly';
                case 1:
                        return 'Register Account | Thrive Thomasino Scholarly';
                case 2:
                        return 'Dashboard | Thrive Thomasino Scholarly';
                default:
                        return 'Thrive Thomasino Scholarly';
        }
}
