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
  <title>GIRO-News</title>

  <?php
  include_once "inc/head-files.php";
  ?>
</head>
<!-- HERE -->
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
            <li class="list-inline-item"><p class="h2 text-lighten font-secondary">news</p></li>

          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some
            universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- notice -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="list-unstyled">
            <!-- notice item -->
            <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
              <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0"><span
                  class="h2 d-block">28</span> AUG,2020</div>
              <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                <a href="notice-50discount.php" class="h4 mb-3 d-block">50%OFF - ONLINE Group Course Sale</a>
                <p class="mb-0">To ensure the safety of both our students and teachers we are running Specialized Online
                  Learning Courses for all our popular Languages including English, Arabic, Russian, French, German and
                  etc.
                  Take an advantage of our 50% discount for LIVE online courses.
                </p>
              </div>
              <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="notice-50discount.php"
                  class="btn btn-primary">read more</a></div>
            </li>
            <!-- notice item -->
            <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
              <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0"><span
                  class="h2 d-block">24</span> AUG,2020</div>
              <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                <a href="ielts-intro.php" class="h4 mb-3 d-block">Free IELTS Introductory Class</a>
                <p class="mb-0">Take your first step towards successful international career - sign up for our FREE IELTS class this Monday! The class will take place on March 25 at 6.30pm.⠀</p>
              </div>
              <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="ielts-intro.php"
                  class="btn btn-primary">read more</a></div>
            </li>
            <!-- notice item -->
            <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
              <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0"><span
                  class="h2 d-block">13</span> AUG,2020</div>
              <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                <a href="amr-vs-bri.php" class="h4 mb-3 d-block">Do you know that there are some differences between words In British and American English?</a>
                <p class="mb-0">The most noticeable difference between American and British English is vocabulary. There are hundreds of everyday words that are different
                </p>
              </div>
              <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="amr-vs-bri.php"
                  class="btn btn-primary">read more</a></div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /notice -->

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