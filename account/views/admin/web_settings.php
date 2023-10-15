<main id="main" class="main">
    <!-- Start of Page Title -->
    <div class="pagetitle">
        <h1>Website Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Basic Setup</li>
            <li class="breadcrumb-item active">Website Settings</li>
        </ol>
    </div>
    <input type="hidden" id="userId" value="<?= $_SESSION['id'] ?>">
    <!-- End Page Title -->
    <section class="section">
        <div class="column">
            <div class="col-lg-15">

                <!-- Website Info -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Website Information</h5>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#preview" class="btn btn-sm btn-danger shadow-sm" id="previewModal">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Preview Website</button>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setWebsiteInfo" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small text-center">
                                        <th class="text-center">Website Header Title</th>
                                        <th class="text-center">Website Short Description</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Telephone</th>
                                        <th class="text-center">Opening Hours</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                    <tr>
                                        <td contenteditable="true"><?= $website_info['header'] ?></td>
                                        <td contenteditable="true"><?= $website_info['descr'] ?></td>
                                        <td contenteditable="true"><?= $website_info['address'] ?></td>
                                        <td contenteditable="true"><?= $website_info['email'] ?></td>
                                        <td contenteditable="true"><?= $website_info['telephone'] ?></td>
                                        <td contenteditable="true"><?= $website_info['opening_hours'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <!-- Table with stripped rows -->
                            <table id="setOtherInfo" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small text-center">
                                        <th class="text-center">Website Welcome Text</th>
                                        <!-- <th class="text-center">Website Header URL</th>
                                        <th class="text-center">Website About Us</th> -->
                                        <th class="text-center">Website Icon</th>
                                        <th class="text-center">Website Header Cover Photo</th>
                                        <th class="text-center">Website Hero Image</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                    <tr>
                                        <td contenteditable="true"><?= $website_other['welcome_text'] ?></td>
                                        <!-- <td contenteditable="true"><?= $website_other['url'] ?></td>
                                        <td contenteditable="true"><?= $website_other['about_url'] ?></td> -->
                                        <td>
                                            <div class="profile-pic" style="width: auto;">
                                                <label class="-label" for="icon">
                                                    <span class="glyphicon glyphicon-camera"></span>
                                                    <span>Change Image</span>
                                                </label>
                                                <input id="icon" type="file" onchange="loadFile(event, 1, 'ioutput')" />
                                                <img id="ioutput" src="<?= $website_other['icon'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $website_other['icon'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="profile-pic" style="width: auto;">
                                                <label class="-label" for="cover">
                                                    <span class="glyphicon glyphicon-camera"></span>
                                                    <span>Change Image</span>
                                                </label>
                                                <input id="cover" type="file" onchange="loadFile(event, 2, 'foutput')" />
                                                <img id="foutput" src="<?= $website_other['cover'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $website_other['cover'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="profile-pic" style="width: auto;">
                                                <label class="-label" for="hero">
                                                    <span class="glyphicon glyphicon-camera"></span>
                                                    <span>Change Image</span>
                                                </label>
                                                <input id="hero" type="file" onchange="loadFile(event, 3, 'houtput')" />
                                                <img id="houtput" src="<?= $website_other['hero'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $website_other['hero'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table id="setScholarText" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small text-center">
                                        <th class="text-center">Senior High School Scholarship Text</th>
                                        <th class="text-center">College Educational Assistance Text</th>
                                        <th class="text-center">College Full Scholarship Text</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                    <tr>
                                        <td contenteditable="true"><?= $website_scholar_text[0]['scholarText'] ?></td>
                                        <td contenteditable="true"><?= $website_scholar_text[1]['scholarText'] ?></td>
                                        <td contenteditable="true"><?= $website_scholar_text[2]['scholarText'] ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <table id="setSlider" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small text-center">
                                        <th class="text-center">Slider Image</th>
                                        <th class="text-center">Slider Text</th>
                                        <th class="text-center">Slider SubText</th>
                                        <th class="text-center">Active Flag</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">
                                    <tr>
                                        <td contenteditable="true"><?= $website_scholar_text[0]['scholarText'] ?></td>
                                        <td contenteditable="true"><?= $website_scholar_text[1]['scholarText'] ?></td>
                                        <td contenteditable="true"><?= $website_scholar_text[2]['scholarText'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Website Socials -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Website Social Information</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_socials" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Social Information</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setWebsiteSocials" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class="small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Social Type</th>
                                        <th class="text-center">Link</th>
                                        <th class="text-center">Added By</th>
                                        <th class="text-center">Date Added</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Website Administrators -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">YDO Officials</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_officials" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Officials</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setWebsiteOfficials" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Job Title</th>
                                        <th class="text-center">Description</th>
                                        <th class="text-center">Official Socials</th>
                                        <th class="text-center">Date Added</th>
                                        <th class="text-center">Added By</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Website Alumni -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">YDO Alumni</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#add_alumni" class=" btn btn-sm btn-danger shadow-sm">
                                    <i class="fas fa-question fa-sm text-white-50 mr-2"></i>Add Alumni</a>
                            </div>

                            <!-- Table with stripped rows -->
                            <table id="setWebsiteAlumni" class="table table-bordered table-condensed table-striped" width="100%" cellspacing="100%">
                                <thead>
                                    <tr class=" small text-center">
                                        <th class="text-center">No</th>
                                        <th class="text-center">Alumni Name</th>
                                        <th class="text-center">Job Title</th>
                                        <th class="text-center">Testimony Message</th>
                                        <th class="text-center">Date Added</th>
                                        <th class="text-center">Added By</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="small text-center">

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>

                <!-- Calendar of Activities -->
                <div class="card">
                    <div class="card-body ">
                        <div class="table-responsive">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title">Calendar of Activities</h5>
                            </div>
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Preview -->
    <div class="modal modal-xl fade" id="preview" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">View Website</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Notif Modal -->
    <div class="modal fade" id="add_socials" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Website Socials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="socType" class="form-label col-3">Social Type</label>
                        <select id="socType" class="form-select col" name="Social Type">
                            <option value="0" selected>Facebook</option>
                            <option value="1">Twitter</option>
                            <option value="2">Instagram</option>
                            <option value="3">Linkedin</option>
                        </select>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="socLink" class="form-label col-3">Link</label>
                        <input type="text" class="form-control col" id="socLink" aria-describedby="socLink" name="Social Media Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="addSocial">Add Social Media</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Notif Modal -->
    <div class="modal fade" id="editSocialModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Website Social</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="socialId">
                    <input type="hidden" id="updateSocType">
                    <div class="row d-flex align-items-center mb-2">
                        <label for="updateSocType" class="form-label col-3">Social Type</label>
                        <input id="socName" class="form-control col" name="Social Type" readonly></input>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <label for="updateSocLink" class="form-label col-3">Link</label>
                        <input type="text" class="form-control col" id="updateSocLink" aria-describedby="updateSocLink" name="Social Media Link">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" id="updateSoc">Update Social Link</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Official Modal -->
    <div class="modal modal-lg fade" id="add_officials" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Officials</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="officialName" class="form-label col-6">Name of Official</label>
                            <input type="text" class="form-control col" id="officialName" aria-describedby="officialName" name="Official Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="jobTitle" class="form-label col-6">Job Title</label>
                            <input type="text" class="form-control col" id="jobTitle" aria-describedby="jobTitle" name="Official Job Title">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="descr" class="form-label col-6">Description/Quote</label>
                            <textarea name="Official Description" class="form-control" id="descr" cols="10" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="officialImg" class="form-label col-6">Profile Image</label>
                            <input type="file" class="form-control col" id="officialImg" accept="image/*" name="Official Profile Image">
                        </div>
                        <div class="form-group col-md-12 my-3">
                            <img src="" id="officialImgShow" class="img-fluid w-50" alt="Official Image">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="fbLink" class="form-label col-6">Facebook URL</label>
                            <input type="text" class="form-control col" id="fbLink" aria-describedby="fbLink" name="Facebook URL">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="igLink" class="form-label col-6">Instagram URL</label>
                            <input type="text" class="form-control col" id="igLink" aria-describedby="igLink" name="Instragram URL">
                        </div>
                        
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="twtLink" class="form-label col-6">Twitter URL</label>
                            <input type="text" class="form-control col" id="twtLink" aria-describedby="twtLink" name="Twitter URL">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="linkUrl" class="form-label col-6">Linkedin URL</label>
                            <input type="text" class="form-control col" id="linkUrl" aria-describedby="linkUrl" name="Linkedin URL">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="active" class="form-label col-6">Active Status</label>
                            <select name="Active" id="active" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="addOfficials">Add Official</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Official Modal -->
    <div class="modal modal-lg fade" id="editOfficial" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Official</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="officialId">
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="eofficialName" class="form-label col-6">Name of Official</label>
                            <input type="text" class="form-control col" id="eofficialName" aria-describedby="officialName" name="Official Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ejobTitle" class="form-label col-6">Job Title</label>
                            <input type="text" class="form-control col" id="ejobTitle" aria-describedby="jobTitle" name="Official Job Title">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="edescr" class="form-label col-6">Description/Quote</label>
                            <textarea name="Official Description" class="form-control" id="edescr" cols="10" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="eofficialImg" class="form-label col-6">Profile Image</label>
                            <input type="file" class="form-control col" id="eofficialImg" accept="image/*" name="Official Profile Image">
                        </div>
                        <div class="form-group col-md-12 my-4">
                            <img src="" id="eofficialImgShow" class="img-fluid w-50" alt="Official Image">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="efbLink" class="form-label col-6">Facebook URL</label>
                            <input type="text" class="form-control col" id="efbLink" aria-describedby="fbLink" name="Facebook URL">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="eigLink" class="form-label col-6">Instagram URL</label>
                            <input type="text" class="form-control col" id="eigLink" aria-describedby="igLink" name="Instragram URL">
                        </div>
                        
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="etwtLink" class="form-label col-6">Twitter URL</label>
                            <input type="text" class="form-control col" id="etwtLink" aria-describedby="twtLink" name="Twitter URL">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="elinkUrl" class="form-label col-6">Linkedin URL</label>
                            <input type="text" class="form-control col" id="elinkUrl" aria-describedby="linkUrl" name="Linkedin URL">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="eactive" class="form-label col-6">Active Status</label>
                            <select name="Active" id="eactive" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updateOfficial" class="btn btn-warning">Update Official</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Alumni Modal -->
    <div class="modal modal-lg fade" id="add_alumni" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Alumni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="alumniName" class="form-label col-6">Name of Alumni</label>
                            <input type="text" class="form-control col" id="alumniName" aria-describedby="alumniName" name="Alumni Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="alumniTitle" class="form-label col-6">Job Title</label>
                            <input type="text" class="form-control col" id="alumniTitle" aria-describedby="alumniTitle" name="Alumni Job Title">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="alumniDesc" class="form-label col-6">Testimony Message</label>
                            <textarea name="Testimony Message" class="form-control" id="alumniDesc" cols="10" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="alumniImage" class="form-label col-6">Profile Image</label>
                            <input type="file" class="form-control col" id="alumniImage" accept="image/*" name="Alumni Profile Image">
                        </div>
                        <div class="form-group col-md-12 my-3">
                            <img src="" id="alumniImgShow" class="img-fluid w-50" alt="Alumni Image">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="alumniActive" class="form-label col-6">Active Status</label>
                            <select name="Active" id="alumniActive" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="addAlumni">Add Alumni</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Official Modal -->
    <div class="modal modal-lg fade" id="editTestimony" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Alumni</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="alumniId">
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-6">
                            <label for="ealumniName" class="form-label col-6">Name of Alumni</label>
                            <input type="text" class="form-control col" id="ealumniName" aria-describedby="ealumniName" name="Alumni Name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="ealumniTitle" class="form-label col-6">Job Title</label>
                            <input type="text" class="form-control col" id="ealumniTitle" aria-describedby="ealumniTitle" name="Alumni Job Title">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="ealumniDesc" class="form-label col-6">Testimony Message</label>
                            <textarea name="Testimony Message" class="form-control" id="ealumniDesc" cols="10" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="ealumniImage" class="form-label col-6">Profile Image</label>
                            <input type="file" class="form-control col" id="ealumniImage" accept="image/*" name="Alumni Profile Image">
                        </div>
                        <div class="form-group col-md-12 my-3">
                            <img src="" id="ealumniImgShow" class="img-fluid w-50" alt="Alumni Image">
                        </div>
                    </div>
                    <div class="row d-flex align-items-center mb-2">
                        <div class="form-group col-md-12">
                            <label for="ealumniActive" class="form-label col-6">Active Status</label>
                            <select name="Active" id="ealumniActive" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updateAlumni" class="btn btn-warning">Update Alumni</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->