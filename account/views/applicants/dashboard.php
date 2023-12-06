<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle d-none">
        <h1>Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>
    <!-- End Page Title -->
    <section class="section dashboard">
        <!-- DASHBOARD PROFILE -->
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column">
                        <div class="d-flex flex-row mb-2">
                            <!-- Profile Pic -->
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="profile-pic mt-2 py-2 ms- d-flex flex-column" style="width: 150px; height: 170px">
                                    <?php if ($finishFlag) : ?>
                                        <img src="<?php echo $user_info['fbImage'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['fbImage'] ?>" id="output" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1" />
                                    <?php else : ?>
                                        <!-- <label class="-label" for="file">
                                                <span class="glyphicon glyphicon-camera"></span>
                                                <span>Change Image</span>
                                            </label> -->
                                        <input id="file" type="file" onchange="loadFile(event)" />
                                        <img id="output" src="<?php echo $user_info['fbImage'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['fbImage'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                    <?php endif; ?>
                                    </Xdiv>
                                </div>
                            </div>
                            <div class="container">
                                <div class="column">
                                    <div class="xadjustable-line-spacing" style="margin-top: 30px;">
                                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start rounded-2 p-2 mb-1">
                                            <!-- Profile Infor -->
                                            <div class=" adjustable-line-spacing">
                                                <p class="mb-2" style="font-size: 14px; color: #000000;">Name: <span class="mb-2 fw-bold" style="font-size: 15px; color: #000000;"> <?= $user_info['first_name'] . " " . $user_info['middle_name'] . " " . $user_info['last_name'] ?></span></p>
                                                <p class="mb-2" style="font-size: 14px; color: #000000;">Course: <span class="mb-2 fw-bold" style="font-size: 15px; color: #000000;"> <?= $latestEd ?> </span></p>
                                                <p class="mb-2 text-break" style="font-size: 14px; color: #000000;"> Username: <span class="mb-2 fw-bold" style="font-size: 15px; color: #000000;"> <?= $user_data[1] ?> </span></p>
                                                <p class="mb-2" style="font-size: 14px; color: #000000;">School Name: <span class="mb-2 fw-bold" style="font-size: 15px; color: #000000;"> <?= $latestSchoolName ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- status -->
            <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Dashboard</h5>
                            <div class="xadjustable-line-spacing" style="margin-top: 5px;">
                                <div class="d-flex flex-column flex-md-column justify-content-between align-items-start rounded-2 p-2 mb-1" style="background-color: #efefef;">
                                    <div class="p-2">
                                        <p class="small text-muted mb-1">Status:</p>
                                        <p class="mb-0 fw-bold"><?= getAccountType($_SESSION['account_type'])[0] ?>  <?php //echo get_scholar_status($scholarStat['status']) ?></p>
                                    </div>
                                    <div class="p-2">
                                        <p class="small text-muted mb-1">Scholarship Type:</p>
                                        <p class="mb-0 fw-bold"><?= get_scholar_type($_SESSION['scholarType']) ?></p>
                                    </div>
                                    <div class="p-2">
                                        <p class="small text-muted mb-1">Education Level:</p>
                                        <p class="mb-0 fw-bold"><?= $latestSchoolType ?></p>
                                    </div>
                                    <div class="p-2">
                                        <p class="small text-muted mb-1">Semester:</p>
                                        <p class="mb-0 fw-bold truncate-text"><?= $currentAy ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- USER'S DASHBOARD -->
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="column">
                        <!-- GENERAL REQUIREMENTS DASHBOARD -->
                        <div class="col-lg-12">
                            <div class="card recent-sales overflow-auto">
                                <div class="card-body">
                                    <h5 class="card-title">General Requirements<span> | Progress</span></h5>
                                    <?php 
                                        if($_SESSION['account_type'] == 3){
                                            $tabName = 'applicationFileTable';
                                        }elseif($_SESSION['account_type'] == 2){
                                            if($status['status'] == 3){ 
                                                $tabName = 'renewalFileTable';
                                            }else{
                                                $tabName = 'assessmentFileTable';
                                            }
                                        }
                                    ?>
                                    
                                    <table id="<?php echo $tabName; ?>" class="table table-borderless text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Requirements</th>
                                                <th class="text-center">Date Submitted</th>
                                                <th class="text-center">Remarks</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End GENERAL REQUIREMENTS DASHBOARD -->
                    </div>
                </div><!-- End Left side columns -->
            </div>

    </section>
</main><!-- End #main -->