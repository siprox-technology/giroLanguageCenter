<?php
// Check if proper activatin message is assigned to GET array
if($_SERVER['REQUEST_METHOD']!=='GET'){
  header('Location:index.php');
}
if(!isset($_GET['act_result']))
{
    $_GET['act_result']= 'No Acount to activate';
}
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
  <title>GIRO-Activation</title>
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
    

  <!-- log in Modal -->
  <?php include "inc/login-modal.php"?>
<!-- Activation result -->
    <section class="hero-section overlay bg-cover" data-background="images/banner/banner-1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-block d-md-none">
                  <h2 class="text-white"><?php echo $_GET['act_result']?></h2>
                </div>
                <div class="col-md-12 text-center d-none d-md-block">
                   <h1 class="text-white"><?php echo $_GET['act_result']?></h1>
                </div>
            </div>
        </div>
    </section>

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