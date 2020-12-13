<?php
session_start();
if(isset($_SESSION['loggedin']))
{
    session_regenerate_id();
    session_unset();
    session_destroy();
    setcookie('PHPSESSID', '', time() - 3600,'/');
    // Redirect to the login page:
    header('Location:../index.php');
}
else
{
  session_regenerate_id();
    header('Location:../index.php');
}

?>