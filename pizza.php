<?php
include('connectie.php');
include('functies.php');
session_start();
if ( !isset( $_SESSION['winkelwagen'] ) ) {
  $_SESSION['winkelwagen'] = array();
  }

$sql = "SELECT * FROM producten";
$stmt = $conn->query($sql);
$results = $stmt->fetchAll();

if(isset($_GET['productid'])) {

    $sql = "SELECT * FROM producten WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":id", $_GET['productid']);
    $stmt->execute();
    $resultProduct = $stmt->fetch();


    if(isset($_SESSION['winkelwagen'][$resultProduct['name']])) {
        $_SESSION['winkelwagen'][$resultProduct['name']] += 1;
        header("Location: pizza.php");
    } else {
        $_SESSION['winkelwagen'][$resultProduct['name']] = 1;
        header("Location: pizza.php");
    }
}

if(isset($_GET['leegWinkelwagen'])) {
    unset($_SESSION["winkelwagen"]);
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
        <a class="nav-link text-white" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Pizza.php">Pizza's</a>
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
  <form class="form" action="" method="post">
        <h1 class="Bestellen">Bestel gegevens
        </h1>
        <input type="text" class="login-input" name="straatnaam" placeholder="Straatnaam" required/>
        <input type="text" class="login-input" name="postcode" placeholder="Postcode" required>
        <input type="text" class="login-input" name="stad" placeholder="Stad" required>
        <input type="text" class="login-input" name="huisnummer" placeholder="Huisnummer" required>
        <input type="submit" name="submit" value="Bestellen" class="login-button">
    </form>
    <?php
    if (isset($_SESSION['winkelwagen'])) print_r($_SESSION['winkelwagen']);
    echo "<br>";
    echo "<a href='pizza.php?leegWinkelwagen'>Leeg winkelwagen</a>";
    echo "<br>";
    foreach($results as $result) {
        echo $result['name'];
        echo "<br>";
        echo "<img src='".$result['image']."' alt='Product img' style='max-width: 200px; max-height: 200px;'>";
        echo "<br>";
        echo "Prijs: €" . $result['price'];

        echo "<br>";
        echo "<a href='pizza.php?productid=" . $result['id'] . "'>Voeg toe aan winkelwagen</a>";
        echo "<br>";echo "<br>";
    }
    ?>



    
</body>
</html>