<?php
    session_start();
    require('connectie.php');


    if(isset($_SESSION['username'])) {
      header("location: dashboard.php");

    } 