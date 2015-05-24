<?php include("dbconnect.php");
session_start();

$sql = "DELETE FROM results WHERE user_id = '$_SESSION[user_id]'";
$dbh->query($sql);

session_destroy();
header("Location: index.php");
?>