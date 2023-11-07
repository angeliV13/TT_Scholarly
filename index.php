<?php include('account/model/functionModel.php') ?>
<?php include('account/global_variables.php') ?>

<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- add icon link -->
<link rel="icon" href="account/<?= $website_other['icon'] ?>" type="image/x-icon">


<title><?= $website_info['header'] ?></title>
<meta content="" name="description">
<meta content="" name="keywords">
<!-- PWA -->
<link rel="manifest" href="manifest.json">
<link rel="apple-touch-icon" href="images/android-chrome-192x192.png">
<link rel="apple-touch-icon" href="images/android-chrome-512x512.png">

<!-- Favicons
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!--DRAGGABLE CARD -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- Add Bootstrap and DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    // Initialize DataTables
    $('#applicantListTable').DataTable({
      "paging": true, // Enable pagination
      "lengthChange": true, // Enable "number of entries" dropdown
      "searching": true, // Enable search
      "info": true, // Show information about the table
      "language": {
        "paginate": {
          "previous": "&lt;", // Custom pagination previous button
          "next": "&gt;" // Custom pagination next button
        }
      }
    });
  });
</script>

<!-- Template Main CSS File -->
<link href="assets/css/main.css" rel="stylesheet">

<!-- x
  * Template Name: Yummy
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<div class="container">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</div>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex  justify-content-between">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-3">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="images/apple-tts-icon.png" href="#hero" alt=""> -->
        <!-- <h1><?= $website_info['header'] ?><span></span></h1> -->
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#about">About</a></li>
          <li><a href="#scholarship">Scholarships</a></li>
          <li><a href="#calendarAct">Calendar of Activities </a></li>
          <li><a href="#headAd">Administrators</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a class="#login" href="account/index.php">Login</a></li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list" style="color: rgb(255, 255, 255);"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">

    <div class="container">
      <!-- Slides only carousel -->
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/img/slides-1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="assets/img/slides-2.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="assets/img/slides-3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
      </div><!-- End Slides only carousel-->
      <div class="row justify-content-between gy-5 ">
        <!-- <div class="col-lg-4 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up"><?= $website_other['welcome_text'] ?></h2>
          <p data-aos="fade-up" data-aos-delay="100"><?= $website_other['welcome_text'] ?></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="account/pages-register.php" class="btn-book-a-table">Apply Scholarship</a>
            <?php if ($website_other['url'] != null) : ?> -->
        <!-- <a href="<?= $website_other['url'] ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
      <?php endif; ?>
      </div>
    </div>
    <!-- <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="account/<?= $website_other['hero'] ?>" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div> -->
    </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>ABOUT</h2>
          <h3><span>LET'S GET TO KNOW ABOUT US!</span></h3>
        </div>
        <div class="row gy-4">
          <img src="account/<?= $website_other['cover'] ?>" class="col-lg-7 position-relative about-img" data-aos="fade-up" data-aos-delay="150">
          </img>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                <?= $website_info['descr'] ?>
              </p>

              <!-- <?php if ($website_other['about_url'] != '') : ?>
                <div class="position-relative mt-4">
                  <img src="assets/img/white.jpg" class="img-fluid" alt="">
                  <a href="<?= $website_other['about_url'] ?>" class="glightbox play-btn"></a>
                </div>
              <?php endif; ?> -->
            </div>
          </div>
        </div>

      </div>
    </section> <!-- End About Section -->

    <!-- ======= SCHOLARSHIP Section ======= -->
    <section id="scholarship" class="menu">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Scholarships</h2>
          <h3><span>SCHOLARSHIP PROGRAM OFFERS</span></h3>
        </div>

        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <li class="nav-tabs">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#senior-high">
              <h4>Senior High-School</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-tabs">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#collegeEA">
              <h4>College Educational Assistance</h4>
            </a> <!-- End tab nav item  -->

          <li class="nav-tabs">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#collegeFS">
              <h4>College Full Scholarship</h4>
            </a>
          </li><!-- End tab nav item  -->
          <li class="nav-tabs">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#general-req">
              <h4>General Requirements</h4>
            </a>
          </li><!-- End tab nav item -->
        </ul>
        <div class="tab-pane fade" id="senior-high">
          <div class="tab-header text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-lg-12">
                <div class="card d-flex justify-content-center">
                  <div class="card-body">
                    <h5 class="card-title">Senior High School</h5>
                    <p><?= $website_scholar_text[0]['scholarText'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="collegeEA">
          <div class="tab-header" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-lg-12">
                <div class="card d-flex justify-content-center">
                  <div class="card-body">
                    <h5 class="card-title">College Educational Assistance</h5>
                    <p><?= $website_scholar_text[1]['scholarText'] ?></p>
                    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="collegeFS">
          <div class="tab-header text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-lg-12">
                <div class="card d-flex justify-content-center">
                  <div class="card-body">
                    <h5 class="card-title">College Full Scholarship</h5>
                    <p><?= $website_scholar_text[2]['scholarText'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade active show" id="general-req">
          <div class="tab-header text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-lg-12">
                <div class="card d-flex justify-content-center">
                  <div class="card-body">
                    <h5 class="card-title">General Requirements</h5>
                    <?php if ($gen_req != null) : ?>
                      <?php foreach ($gen_req as $key => $req) : ?>
                        <p><?= $req['req'] ?></p>
                      <?php endforeach; ?>
                    <?php else : ?>
                      <p>No General Requirements for Now</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section><!-- End SCHOLARSHIP Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Testimonials</h2>
          <h3><span>ALUMNI SCHOLARS</span></h3>
        </div>

        <?php if ($website_testimony != null) : ?>

          <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <?php foreach ($website_testimony as $key => $web) : ?>

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="row gy-4 justify-content-center">
                      <div class="col-lg-6">
                        <div class="testimonial-content">
                          <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            <?= $web['description'] ?>
                            <i class="bi bi-quote quote-icon-right"></i>
                          </p>
                          <h3><?= $web['name'] ?></h3>
                          <h4><?= $web['job_title'] ?></h4>
                        </div>
                      </div>
                      <div class="col-lg-2 text-center">
                        <img src="<?= $web['image'] == null ? "https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" : 'account/' . $web['image'] ?>" class="img-fluid testimonial-img" alt="">
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

              <?php endforeach; ?>

            </div>
            <div class="swiper-pagination"></div>
          </div>

        <?php else : ?>

          <div class="text-center mt-5">
            <h3>No Testimonials for Now</h3>
            <p>Check back later for updates!</p>
          </div>

        <?php endif; ?>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= CALENDAR OF ACTIVITIES Section ======= -->
    <section id="calendarAct" class="events">
      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>YDO CALENDAR</h2>
          <h3><span>CALENDAR OF ACTIVITIES</span></h3>
        </div>

        <?php if ($coa != null) : ?>

          <div class="slides swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <?php foreach ($coa as $key => $ev) : ?>

                <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url(account/<?= $ev['image'] ?>)">
                  <h3><?= $ev['title'] ?></h3>
                  <div class="price align-self-start"><?= $ev['date_start'] ?> to <?= $ev['date_end'] ?></div>
                  <p class="description">
                    <?= $ev['description'] ?>
                  </p>
                </div><!-- End Event item -->

              <?php endforeach; ?>

            </div>
            <div class="swiper-pagination"></div>
          </div>

        <?php else : ?>

          <div class="text-center mt-5">
            <h3>No Active Events for Now</h3>
            <p>Check back later for updates!</p>
          </div>

        <?php endif; ?>

      </div>
    </section><!-- End CALENDAR ACTIVITIES Section -->

    <!-- ======= HEADS AND ADMINISTRATORS Section ======= -->
    <section id="headAd" class="chefs section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>YDO OFFICIALS</h2>
          <h3><span>HEAD AND ADMINISTRATORS</span></h3>
        </div>

        <?php if ($ofc != null) : ?>

          <div class="row gy-4">

            <?php foreach ($ofc as $key => $of) : ?>

              <?php if ($of['active'] == 0) continue; ?>

              <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                <div class="chef-member">
                  <div class="member-img">
                    <img src="account/<?= $of['image'] ?>" class="img-fluid" alt="">
                    <?php if ($of['socials'] != null) : ?>
                      <div class="social">
                        <?php foreach ($of['socials'] as $key => $soc) : ?>
                          <a href="<?= $soc['link'] ?>"><i class="<?= $soc['socType'] ?>"></i></a>
                        <?php endforeach; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                  <div class="member-info">
                    <h4><?= $of['name'] ?></h4>
                    <span><?= $of['job_title'] ?></span>
                    <p><?= $of['description'] ?></p>
                  </div>
                </div>
              </div><!-- End Chefs Member -->

            <?php endforeach; ?>

          </div>

        <?php else : ?>

          <div class="text-center mt-5">
            <h3>No Active Officials for Now</h3>
            <p>Check back later for updates!</p>
          </div>

        <?php endif; ?>
      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <?php if ($website_info != null) : ?>
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Contact</h2>
            <h3><span>Need Help? Contact Us</span></h3>
          </div>

          <div class="mb-3">
            <!-- <iframe style="border:0; width: 100%; height: 350px;" src="https://maps.google.it/maps?q=<?= $website_info['address'] ?>&output=embed"></iframe> -->
            <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13862.541561913424!2d121.13964054729786!3d14.110769102046062!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6595d832b2d3%3A0x4feaa98ea02e3328!2sSanto%20Tomas%20City%20Hall!5e0!3m2!1sen!2sph!4v1693239727931!5m2!1sen!2sph" frameborder="0" allowfullscreen></iframe>
            <!-- <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1020.051547302026!2d121.14238298971618!3d14.110124409799477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd6595d832b2d3%3A0x4feaa98ea02e3328!2sSanto%20Tomas%20City%20Hall!5e0!3m2!1sen!2sph!4v1685624357158!5m2!1sen!2sph&zoom=9" frameborder="0" allowfullscreen></iframe> -->
          </div><!-- End Google Maps -->

          <div class="row gy-4">

            <div class="col-md-6">
              <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-map flex-shrink-0"></i>
                <div>
                  <h3>Our Address</h3>
                  <p><?= $website_info['address'] ?></p>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item d-flex align-items-center">
                <i class="icon bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <a href="mailto:<?= $website_info['email'] ?>"><?= $website_info['email'] ?></a>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p><?= $website_info['telephone'] ?></p>
                </div>
              </div>
            </div><!-- End Info Item -->

            <div class="col-md-6">
              <div class="info-item  d-flex align-items-center">
                <i class="icon bi bi-share flex-shrink-0"></i>
                <div>
                  <h3>Opening Hours</h3>
                  <div>
                    <!-- <strong>Mon-Sat:</strong> 11AM - 23PM;
                      <strong>Sunday:</strong> Closed -->
                    <?= $website_info['opening_hours'] ?>
                  </div>
                </div>
              </div>
            </div><!-- End Info Item -->

          </div>
        </div>
      </section><!-- End Contact Section -->
    <?php endif; ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer ">
    <?php if ($website_socials != null) : ?>
      <div class="footer-links">
        <h4>Follow Us</h4>
        <div class="social-links d-flex justify-content-center me-auto">
          <?php foreach ($website_socials as $key => $social) : ?>
            <a href="<?php echo $social['link']; ?>" class="<?php echo str_replace('bi bi-', '', $social['icon']); ?>" target="_blank" rel="noopener noreferrer"><i class="<?php echo $social['icon']; ?>"></i></a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span><?= $website_info['header'] ?></span></strong>. <br> All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <!-- PWA -->
  <script src="src/index.js"></script>


</body>

</html>