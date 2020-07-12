<?php
session_start();
session_regenerate_id();
$_SESSION['LAST_ACTIVITY'] = time();
if(empty($_SESSION['loggedin']))
{
   header('Location:index.php');
}
else
{
  if($_SESSION['loggedin']!==true)
  {
    header('Location:index.php');
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>STUDENT PROFILE</title>

  <?php
  include_once "inc/head-files.php";
  ?>
</head>

<body class="bg-dark" id="profile_body_student">
  <!-- preloader start -->
  <div class="preloader">
    <img src="images/preloader.gif" alt="preloader">
  </div>
  <!-- AJAX preloader -->
  <div class="preloader_ajax d-none">
    <img src="images/preloader.gif" alt="preloader">
  </div>
  <input type="hidden" id="h_user_id" value="<?php echo $_SESSION['user_id']?>">
  <input type="hidden" id="profile_token" value="<?php echo $_SESSION['_token']?>">


  <div class="profile_container bg-dark" id="profile_container">
    <!-- header -->
    <header class="header">
      <!-- top header -->
      <div class="top-header py-2 bg-footer text_grey">
        <div class="container">
          <div class="row no-gutters">
            <div class="col-lg-4 text-center text-lg-left">
              <a class="text_grey mr-3"><strong>CALL</strong> +44 300 303 0266</a>
              <ul class="list-inline d-inline">
                <li class="list-inline-item mx-0"><a class="text_grey d-inline-block p-2 " href="#"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li class="list-inline-item mx-0"><a class="text_grey d-inline-block p-2 " href="#"><i
                      class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item mx-0"><a class="text_grey d-inline-block p-2 " href="#"><i
                     class="fab fa-linkedin-in"></i></a></li>
                <li class="list-inline-item mx-0"><a class="text_grey d-inline-block p-2 " href="#"><i
                     class="fab fa-instagram"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
              <ul class="list-inline">
                <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block"
                    href="news.php">news</a></li>
                <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block"
                    href="research.html">research</a></li>
                <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block"
                    href="scholarship.php">SCHOLARSHIP</a></li>

                <?php   
                    if(isset($_SESSION['loggedin']))
                    {echo"<li class='list-inline-item'><a class= text-color p-sm-2 py-2 px-0 d-inline-block'
                    id='profileLink'>"."Hi,  ".$_SESSION['name']."</a></li>";
                    echo"<li class='list-inline-item'><a class= text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block' href='inc/logout.php'
                    id='logOutLink'>Logout</a></li>";
                    }else
                    {echo"<li class='list-inline-item'><a class='text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block' href=''
                        data-toggle='modal' data-target='#loginModal' id='logInLink'>login</a></li>";}
                    ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
<hr> 
      <!-- navbar -->
      <div class="navigation w-100">
        <div class="container p-0">
          <nav class="navbar navbar-expand-lg navbar-light p-0 justify-content-around ">
            <div class="circle_pages m-2 m-sm-4 mt-xl-3"></div>
            <a class="h4 mt-1" style="color:#FFC102" href="index.php"><b>GIRO</b>
              LANGUAGE<br>CENTER</a>

            <button class="navbar-toggler rounded-0 ml-auto" type="button" data-toggle="collapse"
              data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <!-- user profile navbar -->
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav ml-auto text-center">
                <!-- user courses drop -->
                <li class="nav-item dropdown view" id="user_courses_drop">
                  <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    COURSES
                  </a>
                  <div class="dropdown-menu" aria-labelledby="user_course_info_drop">
                    <a class="dropdown-item" id="newCourseLink" data-toggle='modal' data-target='#newCourseSignUp'>NEW
                      COURSE</a>
                    <a class="dropdown-item" id="currentCourseLink" data-toggle='modal'
                      data-target='#currentCourse'>CURRENT COURSES</a>
                  </div>
                </li>
                <!--user Assessment drop -->
                <li class="nav-item dropdown view" id="user_tests_info">
                  <a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Assessment
                  </a>
                  <div class="dropdown-menu" aria-labelledby="user_test_info_drop">
                    <a class="dropdown-item" onclick="" id="newTestLink" data-toggle='modal'
                      data-target='#newTestSignUp'>NEW TEST</a>
                    <a class="dropdown-item" onclick="" id="testResultLink" data-toggle='modal'
                      data-target='#currentTest'>TEST RESULTS</a>
                    <a class="dropdown-item" onclick="get_cert_list()" id="certificateListLink" data-toggle='modal'
                      data-target='#certificate'>CERTIFICATES</a>
                  </div>
                </li>
                <li class="nav-item @@events">
                  <a class="nav-link" href="events.html">EVENTS</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item @@about">
                  <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item @@contact">
                  <a class="nav-link" href="contact.php">CONTACT</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>

      <hr>

      <!-- user profile summary-->
      <div class="user_prof_summary row mx-0 ">
        <!-- name image -->
        <div class="col-lg-4 col-12 bg-footer ">
          <div class="d-flex flex-sm-column " id="user_info_summary">
            <!-- user name -->
            <div class="row justify-content-center">
              <h4 class="p-3 mb-0 text-white d-none d-sm-block"><?php echo $_SESSION['name'] ?></h4>
              <P class="p-sm-3 p-2 mb-0 text-white d-sm-none"><?php echo $_SESSION['name'] ?></P>
            </div>
            <!-- user image -->
            <div class="row justify-content-center ml-4 align-self-center mb-sm-2 mx-sm-auto ">
              <img src="images/user_profile_images/<?php echo strval( $_SESSION['email']);?>.jpg" alt=""
                class="rounded-circle bg-dark" id="user_image">
            </div>
            <!-- change img btn -->
            <div class="row justify-content-center mb-1 mx-sm-auto ml-auto mr-2">
              <button class="btn-small btn btn-primary" id="chng_user_img_btn" data-toggle='modal'
                data-target='#change_user_image'> <i class="fa fa-cog "></i></button>
            </div>
          </div>
        </div>
        <!-- user info -->
        <!-- id phone email address -->
        <div class="col-lg-8 col-12 bg-white px-0 px-sm-3">
          <!-- desktop view -->
          <div class="row d-none d-sm-flex pt-3">
            <div class="col-2 d-flex flex-column pr-2">
              <label class="p-2 mb-0 text-primary font-weight-bold ">USER ID</label>
              <label class="p-2 mb-0 text-primary font-weight-bold ">PHONE</label>
              <label class="p-2 mb-0 text-primary font-weight-bold ">EMAIL</label>
              <label class="p-2 mb-0 text-primary font-weight-bold ">ADDRESS</label>
            </div>
            <div class="col-9 d-flex flex-column">
              <label class="p-2 mb-0 text-primary ">
                <?php echo $_SESSION['user_id']?> (Student)
              </label>
              <label class="p-2 mb-0 text-primary "><?php echo $_SESSION['tell'] ?></label>
              <label class="p-2 mb-0 text-primary "><?php echo $_SESSION['email'] ?></label>
              <label class="p-2 mb-0 text-primary "><?php echo $_SESSION['address'] ?></label>
            </div>
            <!-- edit user info btn -->
            <div class="col-1 ">
              <button class="btn-small btn btn-primary" id="edit_user_acc_btn_page" data-toggle='modal'
                data-target='#editUserModal'> <i class="fa fa-cog "></i></button>
            </div>
          </div>
          <!-- mobile view HERE-->
          <div class="col-12 d-flex flex-column d-sm-none p-1">
            <label class="p-2 mb-0 text-primary font-weight-bold">USER ID</label>
            <label class="p-2 mb-0 text-primary "><?php echo $_SESSION['user_id']?> (Student)</label>
            <label class="p-2 mb-0 text-primary font-weight-bold">PHONE</label>
            <label class="p-2 mb-0 text-primary "><?php echo $_SESSION['tell']?></label>
            <label class="p-2 mb-0 text-primary font-weight-bold">EMAIL</label>
            <label class="p-2 mb-0 text-primary "><?php echo $_SESSION['email']?></label>
            <label class="p-2 mb-0 text-primary font-weight-bold">ADDRESS</label>
            <label class="p-2 mb-0 text-primary "><?php echo $_SESSION['address']?></label>
            <div class="d-flex justify-content-end">
              <button class="btn-small btn btn-primary" id="edit_user_acc_btn_page" data-toggle='modal'
                data-target='#editUserModal'> <i class="fa fa-cog "></i></button>
            </div>
          </div>
        </div>
      </div>

      <hr>

      <!-- user course test certificate summary-->
      <div class="row profile-status_student mx-0 ">
        <!-- courses -->
        <div class="current_courses_status bg-footer infinite col-12 col-lg-4 p-3">
          <div class="row justify-content-center m-1">
            <h5 class="text-white">COURSES</h5>
          </div>
          <div class="row">
            <div class="col-6">
              <h6 class="p-2 bg-dark text-orange text-lg text-center">IN PROGRESS
              </h6>
              <h6 class="p-2 bg-dark text-orange text-center rounded" id="curentClassNumber_profile"></h6>
            </div>
            <div class="col-6">
              <h6 class="p-2 bg-dark text-success text-center rounded">FINISHED</h6>
              <h6 class="p-2 bg-dark text-success text-center rounded" id="finishedClassNumber_profile"></h6>
            </div>
          </div>
        </div>
        <!-- test -->
        <div class="current_tests_status col-12 col-lg-4 bg-footer p-3 border border-white">
          <div class="row justify-content-center m-1">
            <h5 class="text-white">EXAMS & TESTS</h5>
          </div>
          <div class="row">
            <div class="col-6">
              <h6 class="p-2 bg-dark text-orange text-lg text-center  rounded slow">TAKEN
              </h6>
              <h6 class="p-2 bg-dark text-orange text-center rounded" id="pendingTestResult_profile"></h6>
            </div>
            <div class="col-6">
              <h6 class="p-2 bg-dark text-success text-center  rounded">RESULTS</h6>
              <h6 class="p-2 bg-dark text-success text-center  delay-1s rounded"
                id="publishedTestResult_profile"></h6>
            </div>
          </div>
        </div>
        <!-- certificate -->
        <div class="current_cert_status bg-footer col-12 col-lg-4 p-3">
          <div class="row justify-content-center m-1">
            <h5 class="text_yellow">CERTIFICATES</h5>
          </div>
          <div class="row">
            <div class="col-12">
              <h6 class="p-2 bg-dark text-success text-lg text-center  rounded ">ACHIEVED
              </h6>
              <h6 class="p-2 bg-dark text-success text-center  rounded" id="cert_achieved_profile"></h6>
            </div>
          </div>
        </div>
      </div>

    </header>
  </div>
  <hr class="d-none d-lg-block">
  <?php include_once "inc/footer.php";
?>

  <!-- edit user account modal -->
  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4" id="editUserModalContent">
        <div class="modal-header border-0">
          <h3>Edit account details</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- adit account form -->
        <div class="modal-body">
          <!-- signUp -->
          <section id="edit_account">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <form id="edit_accountForm">
                    <div class="row tex">
                      <div class="col-md-6 mx-auto">
                        <!-- edit tell -->
                        <div class="form-group">
                          <p class="m-0">Phone number :</p>
                          <input class="form-control mt-1" id="edited_phone" type="text" maxlength="17"
                            required="required" value="<?php echo $_SESSION['tell'];?>">
                          <p class="help-block text-danger ml-1 mb-0" id="edit_phone_err"></p>
                        </div>
                        <!-- address -->
                        <div class="form-group">
                          <p class="m-0">Address :</p>
                          <input class="form-control" id="edited_address" type="address" maxlength="120"
                            required="required" value="<?php echo $_SESSION['address'] ?>">
                          <p class="help-block text-danger ml-1 mb-0" id="edited_address_err"></p>
                        </div>
                        <!-- password -->
                        <div class="form-group">
                          <p class="m-0">Password :</p>
                          <input class="form-control" id="edited_password" type="password" maxlength="20"
                            required="required" data-validation-required-message="Your new Password.">
                          <p class="help-block text-danger ml-1 mb-0" id="edited_pass_err"></p>
                        </div>
                        <!-- showing editing result -->
                        <div class="form-group m-0 text-center">
                          <p class="text-left alert d-none" id="edit_result"></p>
                        </div>
                      </div>
                      <!-- edit button in modal-->
                      <div class="col-lg-12 text-center">
                        <a class="btn btn-primary" id="edit_acc_btn_in_modal" onclick="edit_user_acc()">EDIT</a>
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
  <!-- signup for new course modal -->
  <div class="modal fade" id="newCourseSignUp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-0" id="newCourseSignUpContent">
        <div class="modal-header border-0">
          <h3>New course</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!-- new courses modal content -->
        <div class="modal-body p-0 p-sm-4">
          <div class="row mx-auto" style="max-width:525px">
            <div class="col-md-12">
              <!-- sign up forms carousel (course selection, payment and confirmation) -->
              <div id="signUpForms_carousel" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                  <div class="carousel-item active" id="signupCarousel">
                    <!-- course selection form -->
                    <form class=" px-2" id="sign_up_course_form">
                      <div class="form-row">
                        <div class="form-group col-md-12 text-center text-sm-left">
                          <label for="inputCourse">Course Category</label>
                          <select id="course_category_list" onchange="get_course_names()" class="form-control">
                            <option value="100" selected>Choose...</option>
                            <option value="101">General English</option>
                            <option value="104">Specialised English</option>
                            <option value="102">IELTS</option>
                            <option value="103">TOEFL</option>
                          </select>
                        </div>
                        <div class="form-group col-md-12 text-center text-sm-left">
                          <label for="inputName">Course name</label>
                          <select id="course_name_list" onchange="get_course_levels()" class="form-control">
                            <option value="100" selected>Choose...</option>
                            <!-- course names come here -->
                          </select>
                        </div>
                        <div class="form-group col-md-12 text-center text-sm-left">
                          <label for="inputCourseLevels">Level</label>
                          <select id="course_level_list" onchange="get_course_fees()" class="form-control">
                            <!-- here -->
                            <option value="100" selected>Choose...</option>
                            <!-- levels come here -->
                          </select>
                        </div>
                        <!--course tuition fee  -->
                        <div class="form-group col-md-12 text-center text-sm-left">
                          <label for="inputCourseLevels">Price:</label>
                          <p id="signUpFormPrice" class="text-primary"></p>
                        </div>
                        <div class="form-group col-md-12 text-center">
                          <button class="btn btn-primary p-3" href="#signUpForms_carousel" role="button"
                            data-slide="next" id="joinAndPayBtn" disabled>Join
                            and pay</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- payment carousel -->
                  <div class="carousel-item" id="paymentCarousel">
                    <div class="row">
                      <div class="col-md-12 py-3 mx-auto">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                          <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-card" class="btn nav-link active rounded-pill">
                              Credit Card
                            </a>
                          </li>
                          <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-bank" class="btn nav-link rounded-pill">
                              <i class="fa fa-university"></i>
                              Bank Transfer
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content">
                          <!-- payment result -->
                          <p class="d-none" id="payment_result_info"></p>
                          <!-- Credit card form content -->
                          <form id="crd-card-form">
                            <div class="form-group">
                              <label for="username">Full name (on the card)</label>
                              <input type="text" id="crdt_card_name" name="name_on_card" placeholder="Name on card"
                                class="form-control form-control_xs">
                            </div>
                            <div class="form-group">
                              <label for="cardNumber">Card number</label>
                              <div class="input-group">
                                <input type="text" id="crdt_card_num" name="cardNumber" placeholder="Your card number"
                                  class="form-control form-control_xs" maxlength="16">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-8">
                                <div class="form-group">
                                  <label><span class="hidden-xs">Expiration</span></label>
                                  <div class="input-group">
                                    <input type="text" placeholder="MM" id="exp_month" name="exp_month"
                                      class="form-control form-control_xs" maxlength="2">
                                    <input type="text" placeholder="YY" id="exp_year" name="exp_year"
                                      class="form-control form-control_xs" maxlength="2">
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-8">
                                <div class="form-group mb-4">
                                  <label data-toggle="tooltip"
                                    title="Three-digits code on the back of your card">CVV</label>
                                  <i class="fa fa-question-circle"></i>
                                  <label for="pin" class="float-right">PIN</label>
                                  <div class="input-group">
                                    <input type="text" maxlength="4" placeholder="CVV" id="cvv" name="cvv"
                                      class="form-control form-control_xs">
                                    <input type="text" maxlength="4" placeholder="PIN" id="pin" name="pin"
                                      class="form-control form-control_xs">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <button type="button" id="make_Pay_btn" onclick=" course_payment()"
                              class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">
                              Sign up and Pay</button>
                            <button class="btn btn-primary btn-block rounded-pill shadow-sm"
                              href="#signUpForms_carousel" role="button" data-slide="prev">back</button>
                          </form>
                          <!-- bank transfer info -->
                          <div id="nav-tab-bank" class="tab-pane fade">
                            <h6>Bank account details</h6>
                            <dl>
                              <dt>Bank</dt>
                              <dd> THE WORLD BANK</dd>
                            </dl>
                            <dl>
                              <dt>Account number</dt>
                              <dd>7775877975</dd>
                            </dl>
                            <dl>
                              <dt>IBAN</dt>
                              <dd>CZ7775877975656</dd>
                            </dl>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                              do
                              eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                            <button class="btn btn-primary btn-block rounded-pill shadow-sm"
                              href="#signUpForms_carousel" role="button" data-slide="prev">back</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- payment confirmation page -->
                  <div class="carousel-item " id="pymt_Cnfrm_Carousel">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12 text-center">
                          <h4 class="section-heading text-uppercase text-warning">Payment Confirmation</h4>
                        </div>
                      </div>
                      <!-- payment confirmation table -->
                      <div class="row mt-5">
                        <div class="overflow-auto mx-auto">
                          <table class="table table-stripe">
                            <!-- payment conf info -->
                            <thead>
                              <tr>
                                <th class="">Reference Number:</th>
                                <th class="text-success " id="pymnt_ref"></th>
                              </tr>
                              <tr>
                                <th class="">Course Name:</th>
                                <th class="text-success " id="pymnt_course_name"></th>
                              </tr>
                              <tr>
                                <th class="">Course Level:</th>
                                <th class="text-success " id="pymnt_course_level"></th>
                              </tr>
                              <tr>
                                <th class="">Amount:</th>
                                <th class="text-success " id="pymnt_amount"></th>
                              </tr>
                              <tr>
                                <th class="">Date:</th>
                                <th class="text-success " id="pymnt_date"></th>
                              </tr>
                              <tr>
                                <th class="">User ID:</th>
                                <th class="text-success " id="pymnt_user_id"></th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                      </div>
                      <!-- buttons  -->
                      <div class="row">
                        <div class="col-lg-12 text-center d-flex flex-column">
                          <a id="" class="btn btn-primary m-1 cursor_pointer"
                            onclick="download_course_payment_pdf()">Download
                            PDF</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- current course list modal -->
  <div class="modal fade" id="currentCourse" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-0 p-sm-2 p-md-3 p-lg-4" id="currentCourseModalContent">
        <div class="modal-header border-0">
          <h3>CURRENT COURSES</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--current courses form -->
        <div class="modal-body p-0 p-sm-2 p-md-3">
          <section class="bg-light page-section" style="min-height:843px" id="classList">
            <div class="container p-0 d-flex flex-column">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <h5 class="mt-lg-3">In Progress: </h5>
                  <h6 class="text-warning" id="curentClassNumber"></h6>
                  <h5 class="mt-lg-3">Finished: </h5>
                  <h6 class="text-success" id="finishedClassNumber"></h6>
                  <a id="updateClassListBtn" class="btn btn-primary cursor_pointer mt-3"
                    onclick="update_class_list()">Update</a>
                </div>
              </div>
              <div class="row mt-5 mx-0">
                <div class="overflow-auto mx-auto" style="">
                  <!-- table for desktop view -->
                  <table class="table d-none d-lg-block table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Course title</th>
                        <th scope="col">Level</th>
                        <th scope="col">Start date</th>
                        <th scope="col">Duration</th>
                        <th scope="col">Days</th>
                        <th scope="col">Time</th>
                        <th scope="col">Room</th>
                        <th scope="col">Teacher</th>
                        <th scope="col">Status</th>
                        <th scope="col">Grade</th>
                      </tr>
                    </thead>
                    <tbody id="classListcontent">
                      <!-- here goes the schedule -->
                    </tbody>
                  </table>
                  <!-- table for mobile view -->
                  <table class="table table-striped d-lg-none font-weight-bold" style="font-size:11px">
                    <tbody id="classListcontentMobile">
                      <!--here goes the schedule  -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- new test signup modal -->
  <div class="modal fade" id="newTestSignUp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4" id="signupTestModalContent">
        <div class="modal-header border-0">
          <h3>NEW TEST</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--test signup modal -->
        <div class="modal-body ">
          <!-- test sign up and payemnt -->
          <div id="test_signup_payment" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
              <!-- payment carousel -->
              <div class="carousel-item active" id="test_payment_form">
                <section id="testSignUp">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12">
                        <form id="testSignUpForm">
                          <div class="row">
                            <div class="col-12 col-lg-6 mx-auto">
                              <!-- test payment and signup result -->
                              <p class="d-none" id="test_payment_result_info"></p>
                              <!--test name -->
                              <div class="form-group">
                                <select id="test_name_list" class="form-control">
                                  <!-- list of available tests comes here -->
                                </select>
                              </div>
                              <!-- payment info -->
                              <div class="form-group" id="test_payment_form">
                                <form role="form" id="crd-card-form">
                                  <div class="form-group">
                                    <label for="username">Full name (on the card)</label>
                                    <input type="text" id="NameOnCard" name="name_on_card" placeholder="Name on card"
                                      required="" class="form-control form-control_xs">
                                  </div>
                                  <div class="form-group">
                                    <label for="cardNumber">Card number</label>
                                    <div class="input-group">
                                      <input type="text" id="card_num" name="cardNumber" placeholder="Your card number"
                                        class="form-control form-control_xs" maxlength="16" required="">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-8">
                                      <div class="form-group">
                                        <label><span class="hidden-xs">Expiration</span></label>
                                        <div class="input-group">
                                          <input type="text" placeholder="MM" id="exp-month" name="exp_month"
                                            class="form-control form-control_xs" maxlength="2" required="">
                                          <input type="text" placeholder="YY" id="exp-year" name="exp_year"
                                            class="form-control form-control_xs" maxlength="2" required="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-8">
                                      <div class="form-group mb-4">
                                        <label data-toggle="tooltip"
                                          title="Three-digits code on the back of your card">CVV</label>
                                        <i class="fa fa-question-circle"></i>
                                        <label for="pin" class="float-right">PIN</label>
                                        <div class="input-group">
                                          <input type="text" maxlength="4" placeholder="CVV" id="cvv-num" name="cvv"
                                            class="form-control form-control_xs" required="">
                                          <input type="text" maxlength="4" placeholder="PIN" id="pin-code" name="pin"
                                            class="form-control form-control_xs" required="">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <a id="test_payment" onclick="test_payment()"
                                    class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">
                                    SIGN UP</a>
                                </form>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!-- payment confirmation carousel -->
              <div class="carousel-item " id="test_payment_confirm_form">
                <!-- payment confirmation page -->
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <h4 class="section-heading text-uppercase text-warning">Payment Confirmation</h4>
                  </div>
                </div>
                <!-- payment confirmation table -->
                <div class="row mt-5">
                  <div class="overflow-auto mx-auto">
                    <table class="table table-stripe">
                      <!-- payment conf info -->
                      <thead>
                        <tr>
                          <th class="">Reference Number:</th>
                          <th class="text-success " id="test_pymnt_ref"></th>
                        </tr>
                        <tr>
                          <th class="">Amount:</th>
                          <th class="text-success " id="test_pymnt_amount"></th>
                        </tr>
                        <tr>
                          <th class="">Date:</th>
                          <th class="text-success " id="test_pymnt_date"></th>
                        </tr>
                        <tr>
                          <th class="">User ID:</th>
                          <th class="text-success " id="test_pymnt_user_id"></th>
                        </tr>
                        <tr>
                          <th class="">Test ID:</th>
                          <th class="text-success " id="test_test_id"></th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <!-- buttons  -->
                <div class="row">
                  <div class="col-lg-12 text-center d-flex flex-column">
                    <a id="" class="btn btn-primary m-1 cursor_pointer" onclick="download_test_payment_pdf()">Download
                      PDF</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- current test list and reults modal -->
  <div class="modal fade" id="currentTest" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-0 p-sm-2 p-md-3 p-lg-4" id="currentTestModalContent">
        <div class="modal-header border-0">
          <h3>TEST LIST</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--current courses form -->
        <div class="modal-body p-0 p-sm-2 p-md-3">
          <section class="bg-light page-section" style="min-height:843px" id="tessList">
            <div class="container p-0 d-flex flex-column">
              <div class="row">
                <div class="col-lg-12 text-center">
                  <h5 class="mt-lg-3">Pending result: </h5>
                  <h6 class="text-warning" id="pendingTestResNumber"></h6>
                  <h5 class="mt-lg-3">Published: </h5>
                  <h6 class="text-success" id="publishedTestResultNumber"></h6>
                  <a id="updateClassListBtn" class="btn btn-primary cursor_pointer mt-3"
                    onclick="get_test_result()">Update</a>
                </div>
              </div>
              <div class="row mt-5 mx-0">
                <div class="overflow-auto mx-auto" style="">
                  <!-- table for desktop view -->
                  <table class="table d-none d-lg-block table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Level</th>
                        <th scope="col">Date</th>
                        <th scope="col">Result</th>
                      </tr>
                    </thead>
                    <tbody id="testListcontent">
                      <!-- here goes the test list -->
                    </tbody>
                  </table>
                  <!-- table for mobile view -->
                  <table class="table table-striped d-lg-none font-weight-bold" style="font-size:11px">
                    <tbody id="testListcontentMobile">
                      <!--here goes the schedule  -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- list of certificates for additional req modal -->
  <div class="modal fade" id="certificate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-4" id="certificateModalContent">
        <div class="modal-header border-0">
          <h3>REQUEST ADDITIONAL CERTIFICATES</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--certificate modal -->
        <div class="modal-body ">
          <!-- certificate sign up and payemnt -->
          <div id="certficate_req_payment" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
              <!-- payment carousel -->
              <div class="carousel-item active" id="cert_req_payment_carousel">
                <section id="cert_req_section">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12">
                        <form id="cert_req_SignUpForm">
                          <div class="row">
                            <div class="col-12 col-lg-6 mx-auto">
                              <!-- payment result -->
                              <p class="d-none" id="cert_payment_result_info"></p>
                              <!--cert name -->
                              <div class="form-group">
                                <select id="cert_name_list" class="form-control">
                                  <!-- list of available certficates comes here -->
                                </select>
                              </div>
                              <!-- payment info -->
                              <div class="form-group" id="cert_payment_form">
                                <form role="form" id="crd-card-form">
                                  <div class="form-group">
                                    <label for="username">Full name (on the card)</label>
                                    <input type="text" id="cert_NameOnCard" name="name_on_card"
                                      placeholder="Name on card" required="" class="form-control form-control_xs">
                                  </div>
                                  <div class="form-group">
                                    <label for="cardNumber">Card number</label>
                                    <div class="input-group">
                                      <input type="text" id="cert_card_num" name="cardNumber"
                                        placeholder="Your card number" class="form-control form-control_xs"
                                        maxlength="16" required="">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-sm-8">
                                      <div class="form-group">
                                        <label><span class="hidden-xs">Expiration</span></label>
                                        <div class="input-group">
                                          <input type="text" placeholder="MM" id="cert_exp-month" name="exp_month"
                                            class="form-control form-control_xs" maxlength="2" required="">
                                          <input type="text" placeholder="YY" id="cert_exp-year" name="exp_year"
                                            class="form-control form-control_xs" maxlength="2" required="">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-8">
                                      <div class="form-group mb-4">
                                        <label data-toggle="tooltip"
                                          title="Three-digits code on the back of your card">CVV</label>
                                        <i class="fa fa-question-circle"></i>
                                        <label for="pin" class="float-right">PIN</label>
                                        <div class="input-group">
                                          <input type="text" maxlength="4" placeholder="CVV" id="cert_cvv-num"
                                            name="cvv" class="form-control form-control_xs" required="">
                                          <input type="text" maxlength="4" placeholder="PIN" id="cert_pin-code"
                                            name="pin" class="form-control form-control_xs" required="">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <a id="cert_payment" onclick="cert_payment()"
                                    class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">
                                    PAY</a>
                                </form>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
              <!-- payment confirmation carousel -->
              <div class="carousel-item " id="cert_payment_confirm_form">
                <!-- payment confirmation page -->
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <h4 class="section-heading text-uppercase text-warning">Payment Confirmation</h4>
                  </div>
                </div>
                <!-- payment confirmation table -->
                <div class="row mt-5">
                  <div class="overflow-auto mx-auto">
                    <table class="table table-stripe">
                      <!-- payment conf info -->
                      <thead>
                        <tr>
                          <th class="">Reference Number:</th>
                          <th class="text-success " id="cert_pymnt_ref"></th>
                        </tr>
                        <tr>
                          <th class="">Amount:</th>
                          <th class="text-success " id="cert_pymnt_amount"></th>
                        </tr>
                        <tr>
                          <th class="">Date:</th>
                          <th class="text-success " id="cert_pymnt_date"></th>
                        </tr>
                        <tr>
                          <th class="">User ID:</th>
                          <th class="text-success " id="cert_pymnt_user_id"></th>
                        </tr>
                        <tr>
                          <th class="">Certificate ID:</th>
                          <th class="text-success " id="cert_id"></th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <!-- buttons  -->
                <div class="row">
                  <div class="col-lg-12 text-center d-flex flex-column">
                    <a id="" class="btn btn-primary m-1 cursor_pointer" onclick="download_cert_payment_pdf()">Download
                      PDF</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- change user image modal -->
  <div class="modal fade" id="change_user_image" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content rounded-0 border-0 p-0 p-sm-2 p-md-3 p-lg-4">
        <div class="modal-header border-0">
          <h3>CHANGE PROFILE IMAGE</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--current courses form -->
        <div class="modal-body p-2 p-md-3">
          <section class="bg-light page-section" style="min-height:200px" id="tessList">
            <div class="container">
              <div class="flex flex-column">
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-group">
                <a class="btn btn-primary mb-3" onclick="change_user_img()">uploade</a>
                <p class="d-none " id="image_upload_res"></p>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>


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
  <!-- update class list on after -->
  <script scr="js/script.js">
    update_class_list();
    get_test_result();
    get_avail_test();
    get_test_result();
    get_cert_list();
  </script>
</body>

</html>