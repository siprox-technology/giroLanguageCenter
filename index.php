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
  <title>GIRO-Home</title>
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

  <!-- home page slides -->
  <section class="hero-section overlay bg-cover" data-background="images/banner/banner-1.jpg">
    <div class="container">
      <div class="hero-slider">
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h2 class="text-white" data-animation-out="fadeOutRight" data-delay-out="1" data-duration-in=".3"
                data-animation-in="fadeInLeft" data-delay-in=".1">Welcome to GIRO Language Institute</h2>
              <p class="text-muted mb-4" data-animation-out="fadeOutRight" data-delay-out="1" data-duration-in=".3"
                data-animation-in="fadeInLeft" data-delay-in=".4">In an increasingly unified world,
                Cultural intelligence and language competence is significant for personal and professional growth.
              </p>
              <a data-toggle='modal' data-target='#signupModal' class="btn btn-primary"
                data-animation-out="fadeOutRight" data-delay-out="1" data-duration-in=".3"
                data-animation-in="fadeInLeft" data-delay-in=".7">Register now</a>
            </div>
          </div>
        </div>
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h2 class="text-white" data-animation-out="fadeOutUp" data-delay-out="1" data-duration-in=".3"
                data-animation-in="fadeInDown" data-delay-in=".1">General English Courses</h2>
              <p class="text-muted mb-4" data-animation-out="fadeOutUp" data-delay-out="1" data-duration-in=".3"
                data-animation-in="fadeInDown" data-delay-in=".4">Our General courses will help anyone improve their
                English faster</p>
              <a data-toggle='modal' data-target='#signupModal' href="contact.php" class="btn btn-primary"
                data-animation-out="fadeOutUp" data-delay-out="1" data-duration-in=".3" data-animation-in="fadeInDown"
                data-delay-in=".7">Register now</a>
            </div>
          </div>
        </div>
        <!-- slider item -->
        <div class="hero-slider-item">
          <div class="row">
            <div class="col-md-8">
              <h2 class="text-white" data-animation-out="fadeOutDown" data-delay-out="1" data-duration-in=".3"
                data-animation-in="fadeInUp" data-delay-in=".1">Your Academic and professional future is our mission
              </h2>
              <p class="text-muted mb-4" data-animation-out="fadeOutDown" data-delay-out="1" data-duration-in=".3"
                data-animation-in="fadeInUp" data-delay-in=".4">Our courses provide an excellent preparation for
                academic and business
                goals</p>
              <a data-toggle='modal' data-target='#signupModal' href="contact.php" class="btn btn-primary"
                data-animation-out="fadeOutDown" data-delay-out="1" data-duration-in=".3" data-animation-in="zoomIn"
                data-delay-in=".7">Register now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- home page slides -->

  <!-- banner-feature-->
  <section class="bg-gray">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-xl-4 col-lg-5 align-self-end">
          <img class="img-fluid w-100" src="images/banner/banner-feature.png" alt="banner-feature">
        </div>
        <div class="col-xl-8 col-lg-7">
          <div class="row feature-blocks bg-gray justify-content-between">
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="fas fa-book mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Scholorship News</h3>
              <p>We are offering scholarship to students with outstanding achievements </p>
            </div>
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="fas fa-chalkboard mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Notice Board</h3>
              <p>Visit our news page to get the latest news and updates</p>
            </div>
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="fas fa-calendar-alt mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Our Achievements</h3>
              <p>We have a wide variety of achievements in different areas of teaching English</p>
            </div>
            <div class="col-sm-6 col-xl-5 mb-xl-5 mb-lg-3 mb-4 text-center text-sm-left">
              <i class="fas fa-file-alt mb-xl-4 mb-lg-3 mb-4 feature-icon"></i>
              <h3 class="mb-xl-4 mb-lg-3 mb-4">Admission Now</h3>
              <p>Admissions are open 4 times per year for public classes and 10 times per year for private classes</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /banner-feature -->

  <!-- about us -->
  <section class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 order-2 order-md-1">
          <h2 class="section-title">About GIRO LANGUAGE CENTER</h2>
          <p>In an increasingly unified world, cultural
            intelligence and language competence is significant
            for personal and professional growth. Whether you are
            preparing for academic study, or seeking professional
            linguistic skills to enhance your career, GIRO Language Center
            reflects the specialist nature of the language school itself,
            where quality teaching is supreme. Our primary goal is to
            educate students to become communicatively proficient and advance
            their language skills with one of our language courses.Our Mission statement:“To promote, support and
            encourage the language learning journey of our students, along with providing high quality instruction” </p>
          <a href="about.php" class="btn btn-primary mt-3">Learn more</a>
        </div>
        <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
          <img class="img-fluid w-100" src="images/about/about-us.jpg" alt="about image">
        </div>
      </div>
    </div>
  </section>
  <!-- /about us -->

  <!-- courses -->
  <section class="section-sm">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="d-flex align-items-center section-title justify-content-between">
            <h2 class="mb-0 text-nowrap mr-3">Our Courses</h2>
            <div class="border-top w-100 border-primary d-none d-sm-block"></div>
            <div>
              <a href="courses.php" class="btn btn-sm btn-primary-outline ml-sm-3 d-none d-sm-block">see all</a>
            </div>
          </div>
        </div>
      </div>
      <!-- course list -->
      <div class="row justify-content-center">
        <!-- course item IELTS-->
        <div class="col-lg-4 col-sm-6 mb-5">
          <div class="card p-0 border-primary rounded-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/courses/ielts.jpg">
            <div class="card-body">
              <ul class="list-inline mb-2">
                <li class="list-inline-item"><i class="fa fa-calendar mr-1 text-color"></i>02-14-2020</li>
                <li class="list-inline-item">
                  <p class="text-color">International Exams</p>
                </li>
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
                <li class="list-inline-item">
                  <p class="text-color">International Exam</p>
                </li>
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
              <a data-toggle='modal' data-target='#loginModal' class="btn btn-primary btn-sm">Apply now</a>
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
      <!-- /course list -->
      <!-- mobile see all button -->
      <div class="row">
        <div class="col-12 text-center">
          <a href="courses.php" class="btn btn-sm btn-primary-outline d-sm-none d-inline-block">sell all</a>
        </div>
      </div>
    </div>
  </section>
  <!-- /courses -->

  <!-- cta -->
  <section class="section bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h6 class="text-white font-secondary mb-0">Click to Join the Advance Workshop</h6>
          <h2 class="section-title text-white">Training In Advannce Networking</h2>
          <a href="contact.php" class="btn btn-secondary">join now</a>
        </div>
      </div>
    </div>
  </section>
  <!-- /cta -->

  <!-- success story -->
  <section class="section bg-cover" data-background="images/backgrounds/success-story.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-sm-8">
          <div class="bg-white p-5">
            <h2 class="section-title">Success Stories</h2>
            <p>GIRO Language center helped me a lot with my goal to learn English.
              I chose to have private lessons due to my very busy timetable and because I wanted to focus on my Business
              English
              since I need it for my every day work. GIRO helped me with a friendly service and amazed me with its
              flexibility
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


  <!-- blog -->
  <section class="section pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="section-title">Latest News</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div
            class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/blog/post-1.jpg" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 28, 2020</li>


              </ul>
              <a href="notice-50discount.php">
                <h4 class="card-title">50%OFF - ONLINE Group Course Sale</h4>
              </a>
              <p class="card-text">To ensure the safety of both our students and teachers we are running Specialized
                Online Learning Courses for all our…</p>
              <a href="blog-single.html" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div
            class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/blog/post-2.jpg" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 13, 2020</li>
                <!-- author -->

              </ul>
              <a href="amr-vs-bri.php">
                <h4 class="card-title"> There are differences between words In British and American English</h4>
              </a>
              <p class="card-text">Pullover and Sweater have the same meaning, but Americans prefer to call it Sweater.
                You should know both, ‘cause if you will better understand your interlocutor.</p>
              <a href="amr-vs-bri.php" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
        <!-- blog post -->
        <article class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
          <div
            class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
            <img class="card-img-top rounded-0" src="images/blog/post-3.jpg" alt="Post thumb">
            <div class="card-body">
              <!-- post meta -->
              <ul class="list-inline mb-3">
                <!-- post date -->
                <li class="list-inline-item mr-3 ml-0">August 24, 2020</li>

              </ul>
              <a href="ielts-intro.php">
                <h4 class="card-title">Free IELTS Introductory Class</h4>
              </a>
              <p class="card-text">Take your first step towards successful international career - sign up for our free
                IELTS introductory class on March 25!
              </p>
              <a href="ielts-intro.php" class="btn btn-primary btn-sm">read more</a>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>
  <!-- /blog -->

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