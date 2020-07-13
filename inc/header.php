<header class="fixed-top header">
    <!-- top header -->
    <div class="top-header py-2 bg-white">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-lg-4 text-center text-lg-left">
            <a class="text-color mr-3" ><strong>CALL</strong> +98 905 4312848</a>
            <ul class="list-inline d-inline">
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i
                    class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i
                    class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i
                   class="fab fa-linkedin-in"></i></a></li>
              <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i
                   class="fab fa-instagram"></i></a></li>
            </ul>
          </div>
          <div class="col-lg-8 text-center text-lg-right">
            <ul class="list-inline">
              <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block"
              data-toggle='modal' data-target='#signupModal' id='registerLink'>Register</a></li>
                   <?php   
                  if(isset($_SESSION['loggedin']))
                    {
                      switch($_SESSION['active_status'])
                      {
                        case '0':
                          echo"<li class='list-inline-item'><a class= text-color p-sm-2 py-2 px-0 d-inline-block' href='student-profile.php'
                          id='profileLink'>"."Hi,  ".$_SESSION['name']."</a></li>";
                          echo"<li class='list-inline-item'><a class= text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block' href='inc/logout.php'
                          id='logOutLink'>Logout</a></li>";
                        break;
  
                        case '1':
                          echo"<li class='list-inline-item'><a class= text-color p-sm-2 py-2 px-0 d-inline-block' href='student-profile.php'
                          id='profileLink'>"."Hi,  ".$_SESSION['name']."</a></li>";
                          echo"<li class='list-inline-item'><a class= text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block' href='inc/logout.php'
                          id='logOutLink'>Logout</a></li>";
                        break;
  
                        case '2':
                          echo"<li class='list-inline-item'><a class= text-color p-sm-2 py-2 px-0 d-inline-block' href='teacher-profile.php'
                          id='profileLink'>"."Hi,  ".$_SESSION['name']."</a></li>";
                          echo"<li class='list-inline-item'><a class= text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block' href='inc/logout.php'
                          id='logOutLink'>Logout</a></li>";
                        break;
  
                        case '3':
                        break;
  
                        case'4':
                        break;
  
                        default:
                      break;
                      }
                    }
                    else
                    {
                        echo"<li class='list-inline-item'><a class='text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block' href=''
                         data-toggle='modal' data-target='#loginModal' id='logInLink'>login</a></li>";
                    }
                  ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- navbar -->
    <div class="navigation w-100">
      <div class="container p-0">
        <nav class="navbar navbar-expand-lg navbar-light p-0 justify-content-around ">
          <div class="circle_pages m-2 m-sm-4 mt-xl-3"></div>
          <a class="h4 mt-1" style="color:#FFC102"
            href="index.php"><b>GIRO</b>
            LANGUAGE<br>CENTER</a>
          <button class="navbar-toggler rounded-0 ml-auto" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <?php $currentPage = basename($_SERVER['SCRIPT_FILENAME']); ?>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto text-center">
              <li class="nav-item <?php if ($currentPage == 'index.php') {echo "active";} ?>">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item @@about <?php if ($currentPage == 'about.php') {echo "active";} ?>">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item @@courses <?php if ($currentPage == 'courses.php') {echo "active";} ?>">
                <a class="nav-link" href="courses.php">COURSES</a>
              </li>
              <li class="nav-item @@news <?php if ($currentPage == 'news.php') {echo "active";} ?>">
                <a class="nav-link" href="news.php">news</a>
              </li>
              <li class="nav-item @@contact <?php if ($currentPage == 'contact.php') {echo "active";} ?>">
                <a class="nav-link" href="contact.php">CONTACT</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </header>