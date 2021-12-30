<?php
include("aut_session.php");
include "functies.php";

if (!isset($_SESSION['username'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pietzaas</title>
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<h1 class="text-white">Pietzaas</h1>
  
		<div class="mr-auto"></div>
    <ul class="text-white navbar-nav">
    	  	
    <li class="nav-item">
        <a class="nav-link text-white" href="dashboard.php">Loguit</a>
      </li>
    <li class="nav-item">
        <a class="nav-link text-white" href="index.php">Producten</a>
      </li>
         <li class="nav-item">
        <a class="nav-link text-white" href="winkelwagen.php" >Winkelmandje<span id="cart" class="badge badge-warning mx-2"></span></a>
      </li>
      <?php if ($user -> LoggedIn()){ ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="registratie.php">Registratie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Login.php">Login</a>
      </li>
      <?php } ?>


        
    </ul>
	
	</nav>
</body>
</html>