<?php
include("dbconnect.php");
session_start();

if(isset($_POST['username'])) {
    
} else if (isset($_SESSION['account_type'])) {

} else {
    echo "Please Log in...";
}


?>