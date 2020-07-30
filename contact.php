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
  <title>GIRO-Contact</title>
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
            <li class="list-inline-item"><p class="h2 text-lighten  font-secondary">Contact Us</p>
            </li>
           
          </ul>
          <p class="text-lighten">Do you have other questions? Don't worry, there aren't any dumb questions. Just fill
            out the form below and we'll get back to you as soon as possible.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- contact -->
  <section class="section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-title">Contact Us</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-7 mb-4 mb-lg-0">
             <a href="https://www.google.com/maps/place/Woodbridge+Ave,+Clifton,+Nottingham+NG11+8GP,+UK/@52.9129111,-1.1793597,17z/data=!4m5!3m4!1s0x4879c261bf9b9747:0xcb7569408343e4a0!8m2!3d52.9128112!4d-1.1776288"><img src="images\map.jpg" class="w-100" alt=""></a> 
        </div>
        <div class="col-lg-5">
          <p class="mb-5">In an increasingly unified world, cultural intelligence and 
            language competence is significant for personal and professional growth. 
            Whether you are preparing for academic study, or seeking professional linguistic skills to enhance your career, 
            GIRO Language Center reflects the specialist nature of the language school itself, where quality teaching is supreme. 
            Our primary goal is to educate students to become communicatively proficient and advance their language skills with one of our language courses.</p>
          <a href="tel:+8802057843248" class="text-color h5 d-block">+98 905 4312848</a>
          <a href="mailto:contact-giro-center@gmail.com" class="mb-5 text-color h5 d-block">contact-giro-center@gmail.com</a>
          <p><b>Address:</b></p>
          <p>No 9, Ahmadi St Janbaz blvd, Mashhad Iran.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /contact -->


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