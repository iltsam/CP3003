<?php
include("dbconnect.php");
session_start();

if(isset($_POST['username'])) {
    $sql = "SELECT * FROM user_accounts WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll();
    if ($results) {
        session_regenerate_id();
        echo "Logged in";
        echo "<pre>";
        print_r($results);
        echo "</pre>";

        // Sets all the Session variables
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['account_type'] = $results['account_type'];

        // When logging in, sets the users question number to 1 -
        $_SESSION['question_number'] = '1';

        // Redirect to index
        header("Location: index.php");
    } else {
        echo "Incorrect Login";
    }

} else if (isset($_SESSION['account_type'])) {
    echo "You are currently logged in as: " . $_SESSION['username'];
} else {
    echo "Please Log in...";
}


?>