<?php
session_start(); 
session_regenerate_id();


    if(empty($_SESSION['loggedin']))
    { 
        echo "loggedOut";
    }

    /* to be un commented */
    if (isset($_SESSION['LAST_ACTIVITY']) && 
    (time() - $_SESSION['LAST_ACTIVITY'] > 60)) {
    
        echo "timeOut";
    }
    else
    {
        $_SESSION['LAST_ACTIVITY'] = time();
    }
?>