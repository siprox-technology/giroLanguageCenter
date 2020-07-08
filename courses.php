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
  <title>GIRO-Courses</title>
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
            <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="courses.php">Our Courses</a>
            </li>
            <li class="list-inline-item text-white h3 font-secondary "></li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some
            universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- courses --> 
  <section class="section">
    <div class="container">
      <!-- course list-->
      <div class="row justify-content-center">
        <!-- course item IELTS-->
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/courses/ielts.jpg">
            <div class="card-body">
              <ul class="list-inline mb-2">
                <li class="list-inline-item"><i class="fa fa-calendar mr-1 text-color"></i>02-14-2020</li>
                <li class="list-inline-item"><p class="text-color">International Exams</p></li>
              </ul>
              <a>
                <h4 class="card-title"><a class="text-color" href="ielts.php">IELTS</a></h4>
              </a>
              <p> Our IELTS preparation course will 
              ensure you have all the skills necessary 
              to take the IELTS exam and achieve desirable results.
               We provide students the strategies for success 
               in all areas of the exam. </p>
              <a data-toggle='modal' data-target='#loginModal' class="btn btn-primary btn-sm">Apply now</a>
            </div>
          </div>
        </div>
        <!-- course item TOEFL-->
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/courses/toefl.jpg">
            <div class="card-body">
              <ul class="list-inline mb-2">
                <li class="list-inline-item"><i class="fa fa-calendar mr-1 text-color"></i>02-14-2020</li>
                <li class="list-inline-item"><p class="text-color">International Exam</p></li>
              </ul>
              <a href="toefl.php">
                <h4 class="card-title"><a class="text-color" href="toefl.php">TOEFL</a></h4>
              </a>
              <p class="card-text mb-4"> Our TOEFL preparation course will 
              ensure you have all the skills necessary 
              to take the TOEFL exam and achieve desirable results.
               We provide students the strategies for success 
               in all areas of the exam. </p>
               <a data-toggle='modal' data-target='#loginModal' class="btn btn-primary btn-sm">Apply now</a>
            </div>
          </div>
        </div>
        <!-- course item GENERAL ENGLISH-->
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/courses/generalEnglish.png" alt="course thumb">
            <div class="card-body">
              <ul class="list-inline mb-2">
                <li class="list-inline-item"><i class="fa fa-calendar mr-1 text-color"></i>02-14-2020</li>
                <li class="list-inline-item"><a class="text-color">English</a></li>
              </ul>
              <a href="genEnglish.php">
                <h4 class="card-title"><a class="text-color" href="genEnglish.php">
                General English for kids and adults</a></h4>
              </a>
              <p class="card-text mb-4"> Our regular English programme
                is aimed at the development of the essential skills, necessary
                for successful communication in English language. 
                </p>
              <a  data-toggle='modal' data-target='#loginModal' class="btn btn-primary btn-sm">Apply now</a>
            </div>
          </div>
        </div>
        <!-- course item SPECIALISED ENGLISH--> 
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/courses/spec-English.png" alt="course thumb">
            <div class="card-body">
              <ul class="list-inline mb-2">
                <li class="list-inline-item"><i class="fa fa-calendar mr-1 text-color"></i>02-14-2020</li>
                <li class="list-inline-item"><a class="text-color">English</a></li>
              </ul>
              <a href="specEnglish.php">
              <h4 class="card-title"><a class="text-color" href="specEnglish.php">
                Specialised English for Business and tourism</a></h4>
              </a>
              <p class="card-text mb-4"> Our Specialised English programme
                is aimed at the development of the essential skills, necessary
                for successful communication in English language in variety of situtaions like
                Business and Tourism.</p>
              <a data-toggle='modal' data-target='#loginModal' class="btn btn-primary btn-sm">Apply now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /courses --> 

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