<?php

session_start();
if(!isset($_SESSION['_token']))
{
$_SESSION['_token'] = strval(random_int (666666, 999999999));
}
session_regenerate_id();

if($_SERVER['REQUEST_METHOD']!=='GET'){
  header('Location:index.php');
}
else
{
  if(!isset($_GET['user'])||!isset($_SESSION['generated_code']))
  {
    header('Location:index.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <title>GIRO-Reset Password</title>

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
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4">
        <div class="modal-header border-0">
          <h3>Login</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <section class="page-section" id="logIn">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <form id="logInForm" >
                    <div class="row tex">
                      <div class="col-md-6 mx-auto">
                        <!-- email -->
                        <div class="form-group">
                          <input class="form-control" id="logInEmail" type="email" placeholder="Email *" required="required"
                            data-validation-required-message="Please enter your email address.">
                          <p class="help-block text-danger"></p>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                          <input class="form-control" id="logInPassword" type="password" maxlength="20" placeholder="Password *"
                            required="required" data-validation-required-message="Please enter your Password.">
                          <input type="hidden" id="_logInToken" name="_token" value ="<?php echo $_SESSION['_token'];?>">
                          <p class="help-block text-danger"></p>
                        </div>
                          <!-- forgot password checkbox -->
                        <div class="form-check my-2">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="forgotPassCheckBtn" value="">Forgot Password
                          </label>
                        </div>
                        <!-- showing log in result -->
                        <div class="form-group m-0">
                          <p class="text-left d-none" id="logIn_result"></p>
                        </div>
                      </div>
                        <!-- log in button -->
                      <div class="col-lg-12 text-center mt-2">
                          <a id="logIn_btn" class="btn btn-primary cursor_pointer btn-xl text-uppercase" onclick="signin_user()">log in</a>
                      </div>
                        <!-- forgot password button --> 
                          <div class="col-lg-12 text-center mt-2">
                        <a id="forgetPassBtn" class="btn btn-primary cursor_pointer btn-xl text-uppercase d-none" onclick="send_rand_code()">Forgot password</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
<!-- password reset form -->
    <section class="hero-section overlay bg-cover pt-xs-5" id="passChangeSection" data-background="images/banner/banner-1.jpg">
        <div class="container">
            <div class="row">
              <div class="col-lg-6 col-md-8 col-sm-10">
                <form>
                    <div class="form-group">
                      <label class="text-muted">Code</label>
                      <input type="password" class="form-control" id="passChngCode" placeholder="Enter code...">
                    </div>
                    <div class="form-group">
                      <label class="text-muted">New Password</label>
                      <input type="password" class="form-control" id="newPass" placeholder="Enter password" maxlength="20">
                    </div>
                    <div class="form-group">
                      <label class="text-muted">Retype New Password</label>
                      <input type="password" class="form-control" id="newPassAgain" placeholder="Enter password again"maxlength="20">
                      <input type="hidden" name="" id="passChangUser" value="<?php echo $_GET['user']?>">
                    </div>
                    <p class="text-left d-none" id="passChngResult"></p>
                    <a class="btn btn-primary cursor_pointer btn-xl text-uppercase" id="chngPassBtn" onclick="change_pass_withCode()">change password with code</a>
                </form>
               </div>
            </div>
        </div>
    </section>
</body>
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