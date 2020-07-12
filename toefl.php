<?php
session_start();
if(!isset($_SESSION['_token']))
{
$_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>GIRO-TOEFL</title>

  <?php
  include_once "inc/head-files.php";
  ?>
</head>

<body>
  <!-- preloader start -->
  <div class="preloader">
    <img src="images/preloader.gif" alt="preloader">
  </div>


  <!-- AJAX preloader -->
  <div class="preloader_ajax d-none">
    <img src="images/preloader.gif" alt="preloader">
  </div>

  <!-- header -->
  <?php include "inc/header.php" ?>
<!-- /header -->


  <!-- signUp Modal -->
  <?php include "inc/signup-modal.php"?>
  <!-- log in Modal -->
  <?php include "inc/login-modal.php"?>

  <!-- page title -->
  <section class="page-title-section overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><h3 class="h2 text-light font-secondary">IELTS Courses</h3>
            </li>
            <li class="list-inline-item text-white h3 font-secondary "></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

<!-- section course info -->
<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-4">
        <!-- course thumb -->
        <img src="images/courses/toefl.jpg" class="img-fluid w-50">
      </div>
    </div>
    <!-- course info -->
    <div class="row align-items-center mb-5">
      <div class="col-xl-3 order-1 col-sm-6 mb-4 mb-xl-0">
        <h2>TOEFL</h2>
      </div>
      <div class="col-xl-6 order-sm-3 order-xl-2 col-12 order-2">
        <ul class="list-inline text-xl-center">
          <li class="list-inline-item mr-4 mb-3 mb-sm-0">
            <div class="d-flex align-items-center">
              <i class="ti-book text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0">COURSES</h6>
                <p class="mb-0">3 to 6 Month</p>
              </div>
            </div>
          </li>
          <li class="list-inline-item mr-4 mb-3 mb-sm-0">
            <div class="d-flex align-items-center">
              <i class="ti-wallet text-primary icon-md mr-2"></i>
              <div class="text-left">
                <h6 class="mb-0">FEE</h6>
                <p class="mb-0">From: $550</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-xl-3 text-sm-right text-left order-sm-2 order-3 order-xl-3 col-sm-6 mb-4 mb-xl-0">
        <a class="btn btn-primary"data-toggle='modal' data-target='#loginModal'>Apply now</a>
      </div>
      <!-- border -->
      <div class="col-12 mt-4 order-4">
        <div class="border-bottom border-primary"></div>
      </div>
    </div>
    <!-- course details -->
    <div class="row">
      <div class="col-12 mb-4">
        <h3>About Course</h3>
        <p>Our TOEFL preparation course will ensure you have 
        all the skills necessary to take the TOEFL exam and 
        achieve desirable results. We provide students the 
        strategies for success in all areas of the exam.
	      </p>
      </div>
      <div class="col-12 mb-4">
        <h3 class="mb-3">Requirements</h3>
        <div class="col-12 px-0">
          <div class="row">
            <div class="col-md-6">
              <ul class="list-styled">
                <li>Score above 40 in TOEFL Mock test</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mb-4">
        <h3 class="mb-3">How to Apply</h3>
        <ul class="list-styled">
          <li> <a data-toggle='modal' data-target='#signupModal'>Register</a> with us online and apply for 
          any course through your personal profile</li>
        </ul>
      </div>
      <!-- teacher -->
      <div class="col-12">
        <h5 class="mb-3">Teacher</h5>
        <div class="d-flex justify-content-between align-items-center flex-wrap">
          <div class="media mb-2 mb-sm-0">
            <img class="mr-4 img-fluid w-25" src="images/teachers/Clark Malik.jpg" alt="Teacher">
            <div class="media-body">
              <h4 class="mt-0">Clark Malik</h4>
              Native speaker
            </div>
          </div>
          <div class="social-link">
            <ul class="list-inline">
              <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i class="ti-linkedin"></i></a></li>
              <li class="list-inline-item"><a class="d-inline-block text-light p-1" href="#"><i class="ti-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="border-bottom border-primary mt-4"></div>
      </div>
    </div>
  </div>
</section>
<!-- /section -->

<?php include_once "inc/footer.php";
?>


<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- filter -->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- google map -->



<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>