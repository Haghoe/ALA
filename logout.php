<?php
session_start();
unset($_SESSION["username"]);
session_destroy();
header('Location: login.php');
if (!isset($_SESSION["username"]))
session_start();
header('Location: login.php');
exit;