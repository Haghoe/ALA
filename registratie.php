<?php
  session_start();
 require('connectie.php');
    require('functies.php');
 
    if (isset($_SESSION["username"]))
     {
        header("location: dashboard.php");
     }
  ?>
  <?php
    // knop submit
    if(isset($_POST['submit'])){
     
        $error = "";
        // variabels voor de inputs
        $username = htmlspecialchars(trim($_POST['username']));
        $password = htmlspecialchars(trim($_POST['password']));
        $email = htmlspecialchars(trim($_POST['email']));
   

        // password hash voor de wachtwoorden
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
 
            // Checken of email bestaat
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            
            // als email niet bestaat wordt account aangemaakt
            if($stmt->rowCount() == 0)
            {

              // Veilig inserten van de inputs
                $stmt = $conn->prepare("INSERT into `users` (username, password, email) VALUES (:username, :hash, :email)");
                $stmt->bindParam('username', $username);
                $stmt->bindParam(':hash', $hashPassword);
                $stmt->bindParam(':email', $email);
                if($stmt->execute()) {
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    header("Location: dashboard.php");
                } else {
                  $error = "Er is iets misgegaan.";
                }


            } else {
              // Als email wel bestaat error aangeven
              $error = "Email is al ingebruik! Verander je email.";      
            }
                
                
           
      }
?>
<html>
<head>
  <body>
    <meta charset="utf-8"/>
    <title>Registratie</title>
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
        <a class="nav-link text-white" href="login.php">Login</a>
      </li>



        
    </ul>
	
	</nav>

    <form class="form" action="" method="post">
        <h1 class="login-title">Registratie
          (Verplicht)
        </h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required/>
        <input type="email"required class="login-input" name="email" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>
        <input type="submit" name="submit" value="Registereren" class="login-button">
    </form>
  
    <?php 
    // Als er een error in de registratie zit dan word deze hier weergegeven.
    if(!empty($error)) {
      ?>
    <div class='form'>
      <h3><?php echo $error;?></h3><br/>
    </div>
  <?php } ?>

</html>