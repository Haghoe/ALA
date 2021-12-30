<?php
    session_start();
    require('connectie.php');


    if(isset($_SESSION['username'])) {
      header("location: dashboard.php");
    } 


    // Inlog submit knop
    if (isset($_POST['submit'])) {
       
       // Variabels voor de inputs
       $username = htmlspecialchars(trim($_POST['username']));
       $password = htmlspecialchars(trim($_POST['password']));
       
       // Checken of gebruikersnaam al bestaat
      $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
      $stmt->bindValue(':username', $username);
      $stmt->execute();

      // $result gebruiken we voor de resultaten
      $result = $stmt->fetch();
      

      // als de opgegeven naam en wachtwoord matchen dan word je ingelogd en krijg je een sessie 
      // die refereerd naar de gebruikersnaam in de database (veilig)
      if ($result && password_verify($password, $result['password'])) {
          $_SESSION['username'] = $result['username'];
          header("location: dashboard.php");
        }
      // Error als gebruikersnaam of wachtwoord fout is
      else {
        echo "<div class='form'>
        <h3>Fout gebruikersnaam/wachtwoord.</h3><br/>
        </div>";
      }
    
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="logo.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="registratie.css"/>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<h1 class="text-white">Pietzaas</h1>
  
		<div class="mr-auto"></div>
    <ul class="text-white navbar-nav">
    	
     
      <li class="nav-item">
        <a class="nav-link text-white" href="registratie.php">Registratie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="Login.php">Login</a>
      </li>


        
    </ul>
	
	</nav>

    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
  </form>

</body>
</html>