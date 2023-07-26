<?php

//Link Checker and Registration
function get_path($lv_path, $type = '99')
{
        if ($type == 0)         //Super Admin 
        {                       //NOT FINAL
                switch ($lv_path) 
                {
                        case 'dashboard':
                                return 'views/admin/dashboard.php';
                        case 'pages-contact':
                                return 'maintenance.php';
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

                        case 'applicants':
                                return 'maintenance.php';

                        case 'exam_settings':
                                return 'views/admin/exam_settings.php';

                        case 'exam_questions':
                                return 'views/admin/exam_questions.php';

                        case 'tts_settings':
                                return 'maintenance.php';
                                
                        default:
                                return 'error.php';
                }
        }

        if ($type == 1)         //Admin
        {
                switch ($lv_path) 
                {
                        case 'dashboard':
                                return 'views/admin/dashboard.php';
                        case 'pages-contact':
                                return 'pages-contact.php';
                        
                        //      Applicants Section
                        case 'new-applicants':
                                return 'views/admin/applicant_new.php';

                        case 'interview':
                                return 'views/admin/applicant_interview.php';

                        case 'assessment':
                                return 'views/admin/applicant_assessment.php';

                        case 'examination':
                                return 'views/admin/applicant_examination.php';

                        case 'removed-applicants':
                                return 'views/admin/applicant_removed.php';

                        case 'beneficiaries':
                                return 'views/admin/bene_list.php';

                        case 'bene-assessment':
                                return 'views/admin/bene-assessment.php';

                        case 'bene-renewal':
                                return 'views/admin/bene-renewal.php';

                        case 'removed-bene':
                                return 'views/admin/bene_removed.php';

                        case 'graduates':
                                return 'views/admin/graduates_list.php';

                        case 'graduating':
                                return 'views/admin/graduating_list.php';

                        case 'Adaccount-management':
                                return 'views/admin/account_management.php';

                        case 'admin-profile':
                                return 'views/admin/profile_admin.php';

                        case 'app-profile':
                                return 'maintenance.php';

                        case 'applicants':
                                return 'maintenance.php';

                        case 'exam_settings':
                                return 'views/admin/exam_settings.php';

                        case 'exam_questions':
                                return 'views/admin/exam_questions.php';

                        case 'tts_settings':
                                return 'views/admin/basic_setup.php';

                        default:
                                return 'error.php';
                }
        } 
        elseif ($type == 2)     //Beneficiaries        
        {
                switch ($lv_path) 
                {

                        case 'dashboard':
                                return 'views/beneficiaries/dashboard.php';

                        case 'assessment-bene':
                                return 'views/beneficiaries/assessment_bene.php';

                        case 'profile-bene':
                                return 'views/beneficiaries/profile_bene.php';

                        case 'renewal-bene':
                                return 'views/beneficiaries/renewal_bene.php';

                        case 'app-profile':
                                return 'views/applicants/profile_bene.php';

                        case 'applicants':
                                return 'maintenance.php';

                        default:
                                return 'error.php';
                }
        } 
        elseif ($type == 3)     //Applicant
        {
                switch ($lv_path) 
                {

                        case 'dashboard_applicant':
                                return 'views/applicants/dashboard_applicant.php';

                        case 'profile_applicant':
                                return 'views/applicants/profile_applicant.php';

                        case 'app-profile':
                                return 'views/applicants/profile_bene.php';

                        case 'examination':
                                return 'maintenance.php';

                        default:
                                return 'error.php';
                }
        }
}

function get_sidebar($type, $access_level = 0)
{
        switch ($type) 
        {
                case 0:
                        return 'views/sidebar/super_admin.php';

                case 1:
                        if ($access_level == 1) 
                        {
                                return 'views/sidebar/semi_super_admin.php';
                        } 
                        else 
                        {
                                return 'views/sidebar/admin.php';
                        }

                case 2:
                        return 'views/sidebar/bene.php';
                case 3:
                        return 'views/sidebar/applicants.php';
        }
}

function get_title($page = 'NA')
{
        switch ($page) 
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
