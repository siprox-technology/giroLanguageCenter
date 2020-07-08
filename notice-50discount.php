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
  <title>GIRO-Offers</title>

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
            <li class="list-inline-item text-white h3 font-secondary nasted">Notice Details</li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some
            universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- notice details -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex">
            <div class="text-center mr-4">
              <div class="p-4 bg-primary text-white">
                <span class="h2 d-block">30</span> APR,2020
              </div>
            </div>
            <!-- notice content -->
            <div>
              <h3 class="mb-4">ONLINE Learning Sale - 50% OFF</h3>
              <p>To ensure the safety of both our students and teachers we are running Specialized Online Learning
                Courses for all our popular Languages including English, IELTS Prep etc.

                Courses will be conducted through live video on the online platform for both Adults and Kids. All
                learning materials will be included in the price.

                We offer you to take an advantage of the current situation and start learning with GIRO Language Center!
                The following courses are offered with discount:
              </p>

              <ul class="list-styled mb-5">
                <li>IELTS Prep courses</li>
                <li>TOEFL Prep courses</li>
                <li>Business English</li>
                <li>General English for Adults</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /notice details -->

  <!-- footer -->
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

  <!-- Main Script -->
  <script src="js/script.js"></script>

</body>

</html>