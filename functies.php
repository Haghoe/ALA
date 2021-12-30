<?php 
require "connectie.php";


function LoggedIn(){
    if (isset($_SESSION['username'])) {
        return true; 
    } else {
        return false;
    }
}


?>