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
          <div class="col-lg-12">
              <div class="container h-100">
                  <div class="row  h-100">
                      <div class="col col-md-9 col-lg-12 col-xl-12">
                          <div class="card">
                              <div class="card-body mt-3">
                                  <div class="d-flex text-black">
                                      <div class="profile-pic d-flex flex-column" style="width: 160px; height:180px;  border-radius: 10px;">
                                          <label class="-label" for="file">
                                              <span class="glyphicon glyphicon-camera"></span>
                                              <span>Change Image</span>
                                          </label>
                                          <input id="file" type="file" onchange="loadFile(event)" />
                                          <!-- <img src="https://cdn.pixabay.com/photo/2017/08/06/21/01/louvre-2596278_960_720.jpg" id="output" width="200" /> -->
                                          <img id="output" src="<?php echo $user_info['profile_img'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : $user_info['profile_img'] ?>" alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2" style="width: 150px; z-index: 1">
                                      </div>
                                      <div class="flex-grow-1 ms-4 mt-3">
                                          <h5 class="mb-1 fw-bold">JUAN DELA CRUZ</h5>
                                          <p class="mb-2 pb-1 fw-bold" style="color: #2b2a2a;">BS Information Technology - FOURTH YEAR</p>
                                          <p class="mb-2 pb-1" style="color: #2b2a2a;">Batangas State University JPLPC- Malvar</p>

                                          <div class="d-flex justify-content-between align-items-center rounded-3 gap-2 p-2 mb-2" style="background-color: #efefef;">
                                              <div>
                                                  <p class="small text-muted mb-1">Status:</p>
                                                  <p class="mb-0 fw-bold">Applicant</p>
                                              </div>
                                              <div class="px-3">
                                                  <p class="small text-muted mb-1">Scholarship Type:</p>
                                                  <p class="mb-0 fw-bold">Education Scholarship Assistance</p>
                                              </div>
                                              <div class="px-3">
                                                  <p class="small text-muted mb-1">Education Level:</p>
                                                  <p class="mb-0 fw-bold">Senior Highschool</p>
                                              </div>
                                              <div>
                                                  <p class="small text-muted mb-1">Semester:</p>
                                                  <p class="mb-0 fw-bold">FIRST SEMESTER AY 2023-2024</p>
                                              </div>
                                          </div>
                                          <!-- <div class="d-flex pt-1">
                                          <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                                          <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
                                      </div> -->
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="row">
              <!-- Left side columns -->
              <div class="col-lg-12">
                  <div class="row">
                      <!-- GENERAL REQUIREMENTS DASHBOARD -->
                      <div class="col-12">
                          <div class="card recent-sales overflow-auto">
                              <div class="card-body">
                                  <h5 class="card-title">General Requirements<span> | Progress</span></h5>

                                  <table id="applicationFileTable" class="table table-borderless text-center">
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
                                          <tr>
                                              <th scope="row"><a href="#">1</a></th>
                                              <td>Certificate of Birth</td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">2</a></th>
                                              <td>Certificate of Good Moral Character</td>
                                              <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-warning">Pending</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">3</a></th>
                                              <td>Report of Grades</td>
                                              <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">4</a></th>
                                              <td>ID Photo (2X2 size)</td>
                                              <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-danger">Rejected</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">5</a></th>
                                              <td>Vicinity Map</td>
                                              <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">6</a></th>
                                              <td>Barangay Clearance</td>
                                              <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">7</a></th>
                                              <td>Parents Voter's ID/Voter's Certification</td>
                                              <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">8</a></th>
                                              <td>Voter's Certificate of the Applicant</td>
                                              <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">9</a></th>
                                              <td>Income Tax Return or Certificate of Employment and Compensation (Parents)</td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                          <tr>
                                              <th scope="row"><a href="#">10</a></th>
                                              <td>Certificate of Indigency or Certificate of Unemployment for the Parents or other Household who are not employed.</td>
                                              <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                                              <td><a href="#" class="text-primary">At praesentium minuzn</a></td>
                                              <td><span class="badge bg-success">Approved</span></td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div><!-- End GENERAL REQUIREMENTS DASHBOARD -->
                  </div>
              </div><!-- End Left side columns -->

              <!-- Right side columns -->
              <!-- <div class="col-lg-4"> -->
              <!-- <div class="card">
                      <div class="filter">
                          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                  <h6>Filter</h6>
                              </li>

                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                          </ul>
                      </div>

                      <div class="card-body">
                          <h5 class="card-title">Recent Activity <span>| Today</span></h5>

                          <div class="activity">

                              <div class="activity-item d-flex">
                                  <div class="activite-label">32 min</div>
                                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                  <div class="activity-content">
                                      Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                                  </div>
                              </div>

                              <div class="activity-item d-flex">
                                  <div class="activite-label">56 min</div>
                                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                                  <div class="activity-content">
                                      Voluptatem blanditiis blanditiis eveniet
                                  </div>
                              </div>

                              <div class="activity-item d-flex">
                                  <div class="activite-label">2 hrs</div>
                                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                  <div class="activity-content">
                                      Voluptates corrupti molestias voluptatem
                                  </div>
                              </div>

                              <div class="activity-item d-flex">
                                  <div class="activite-label">1 day</div>
                                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                                  <div class="activity-content">
                                      Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                                  </div>
                              </div>

                              <div class="activity-item d-flex">
                                  <div class="activite-label">2 days</div>
                                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                                  <div class="activity-content">
                                      Est sit eum reiciendis exercitationem
                                  </div>
                              </div>

                              <div class="activity-item d-flex">
                                  <div class="activite-label">4 weeks</div>
                                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                                  <div class="activity-content">
                                      Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                                  </div>
                              </div>

                          </div>

                      </div>
                  </div> -->

              <!-- News & Updates Traffic -->
              <!-- <div class="card">
                      <div class="filter">
                          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                  <h6>Filter</h6>
                              </li>

                              <li><a class="dropdown-item" href="#">Today</a></li>
                              <li><a class="dropdown-item" href="#">This Month</a></li>
                              <li><a class="dropdown-item" href="#">This Year</a></li>
                          </ul>
                      </div>

                      <div class="card-body pb-0">
                          <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

                          <div class="news">
                              <div class="post-item clearfix">
                                  <img src="assets/img/news-1.jpg" alt="">
                                  <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                                  <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                              </div>

                              <div class="post-item clearfix">
                                  <img src="assets/img/news-2.jpg" alt="">
                                  <h4><a href="#">Quidem autem et impedit</a></h4>
                                  <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
                              </div>

                              <div class="post-item clearfix">
                                  <img src="assets/img/news-3.jpg" alt="">
                                  <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                                  <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
                              </div>

                              <div class="post-item clearfix">
                                  <img src="assets/img/news-4.jpg" alt="">
                                  <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                                  <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
                              </div>

                              <div class="post-item clearfix">
                                  <img src="assets/img/news-5.jpg" alt="">
                                  <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                                  <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
                              </div>
                          </div>
                      </div>
                  </div> -->
              <!-- End News & Updates -->

              <!-- </div> -->
              <!-- End Right side columns -->

              <!-- THOMASINO  -->
              <!-- <div class="row">
                  <div class="col-lg-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center">
                                  <h5 class="card-title">Set Academic Year</h5>
                                  <div class="d-flex align-items-center">
                                      <a class="collapsed mx-3" data-bs-target="#acad_table_view" data-bs-toggle="collapse" href="#">
                                          <i class="bi bi-chevron-down ms-auto"></i>
                                      </a>
                                  </div>
                              </div>
                              <div id="acad_table_view" class="table-responsive nav-content ">
                                  
                                  <ul class="nav nav-tabs nav-tabs-bordered d-flex mt-3" id="borderedTabJustified" role="tablist">
                                      <li class="nav-item flex-fill" role="presentation">
                                          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">News</button>
                                      </li>
                                      <li class="nav-item flex-fill" role="presentation">
                                          <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Calendar of Activities</button>
                                      </li>
                                      <li class="nav-item flex-fill" role="presentation">
                                          <button class="nav-link w-100" id="contact-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Announcements</button>
                                      </li>
                                  </ul>
                                  <div class="tab-content pt-2" id="borderedTabJustifiedContent">

                                      <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                                          <h3 class="card-title small">
                                              <span>News feed from: <a href="https://cityofstotomas.gov.ph/" target="_blank">City of Santo Tomas</a></span>
                                          </h3>

                                          Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.
                                      </div>
                                      <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                                          Nesciunt totam et. Consequuntur magnam aliquid eos nulla dolor iure eos quia. Accusantium distinctio omnis et atque fugiat. Itaque doloremque aliquid sint quasi quia distinctio similique. Voluptate nihil recusandae mollitia dolores. Ut laboriosam voluptatum dicta.
                                      </div>
                                      <div class="tab-pane fade" id="bordered-justified-contact" role="tabpanel" aria-labelledby="contact-tab">
                                          Saepe animi et soluta ad odit soluta sunt. Nihil quos omnis animi debitis cumque. Accusantium quibusdam perspiciatis qui qui omnis magnam. Officiis accusamus impedit molestias nostrum veniam. Qui amet ipsum iure. Dignissimos fuga tempore dolor.
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div> -->
          </div>
      </section>

  </main><!-- End #main -->