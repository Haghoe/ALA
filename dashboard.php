<?php
session_start();
include "functies.php";
include "connectie.php";
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Gebruikers Plek</title>


<html>
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
        <a class="nav-link text-white" href="Pizza.php">Pizza's</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
      </li>
      <?php if (!LoggedIn()){ ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="registratie.php">Registratie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Login.php">Login</a>
      </li>
 
      <?php } ?>


        
    </ul>
	
	</nav>
<body>

    <div class="form">
        <p>Hey, <?php if(isset($_SESSION['username'])) {echo $_SESSION['username'];} ?></p>
        <p>Welkom Bij De User Dashboard klik op de productenlijst om door tegaan.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>