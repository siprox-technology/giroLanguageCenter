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
              <h3 class="mb-4">Do you know that there are some differences between words In British and American
                English?</h3>
              <p>The most noticeable difference between American and British English is vocabulary.

                There are hundreds of everyday words that are different. For example, Brits call the front of a car the
                bonnet, while Americans call it the hood.

                Americans go on vacation, while Brits go on holidays, or hols. New Yorkers live in apartments; Londoners
                live in flats. There are far more examples than we can talk about here. Fortunately, most Americans and
                Brits can usually guess the meaning through the context of a sentence.

              </p>
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