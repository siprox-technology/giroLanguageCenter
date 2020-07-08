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
  <title>GIRO-About</title>
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
            <li class="list-inline-item"><p class="h2 text-lighten font-secondary">About Us</p></li>
            <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
          </ul>
          <p class="text-lighten">Our courses offer a good compromise between the continuous assessment favoured by some
            universities and the emphasis placed on final exams by others.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->

  <!-- about -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <img class="img-fluid w-100 mb-4" src="images/about/about-page.jpg" alt="about image">
          <h2 class="section-title">ABOUT OUR JOURNY</h2>
          <p>GIRO Language centre is an education centre offering a range of academic and non-academic courses. Since its establishment, the institute has been providing customized training solutions 
          in teaching General English and other language skills such as IELTS and TOEFL to academic institutions, corporate groups and individuals. 
          It established a reputation for working creatively and adapting the courses to tight business schedules, 
          specific subject areas and working environment of our clients.
          <p>The centre ensures high quality through employing the best possible talent in the market.
           Most of our teachers are qualified to a minimum Master’s level in language teaching or a related subject,
           have additional certificates in language teaching (IELTS, TOEFL) and have proven 5-15 years of experience in teaching to adult
            learners.
         </p>
        </div>
      </div>
    </div>
  </section>
  <!-- /about -->

  <!-- funfacts -->
  <section class="section-sm bg-primary">
    <div class="container">
      <div class="row">
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="15">0</h2>
            <h5 class="text-white">TEACHERS</h5>
          </div>
        </div>
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="140">0</h2>
            <h5 class="text-white">COURSES</h5>
          </div>
        </div>
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="600">0</h2>
            <h5 class="text-white">STUDENTS</h5>
          </div>
        </div>
        <!-- funfacts item -->
        <div class="col-md-3 col-sm-6 mb-4 mb-md-0">
          <div class="text-center">
            <h2 class="count text-white" data-count="3737">0</h2>
            <h5 class="text-white">SATISFIED CLIENT</h5>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /funfacts -->

  <!-- success story -->
  <section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-8">
          <div class="bg-white p-5">
            <h2 class="section-title">Success Stories</h2>
            <p>GIRO Language center helped me a lot with my goal to learn English. 
              I chose to have private lessons due to my very busy timetable and because I wanted to focus on my Business English
               since I need it for my every day work. GIRO helped me with a friendly service and amazed me with its flexibility 
               and the very good prices. 
               I could postpone or cancel a lessons the day before which was perfect. 
               I can only recommend this center to everyone who wants or needs to learn a new language.</p>
               <p><b>
               Maria Kim
                  </b></p>
               <p><b>31.03.2020</b></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /success story -->

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