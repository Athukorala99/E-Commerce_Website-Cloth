<?php

    session_start();
    session_unset();

    $_SESSION['logoutSuccess'] = "Log out Successfully!";

    header("location: ../index.php");
  
?>