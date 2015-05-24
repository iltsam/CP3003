<?php
include("dbconnect.php");
session_start();

if(isset($_POST['username'])) {
    $sql = "SELECT * FROM user_accounts WHERE username = '$_POST[username]' AND password = '$_POST[password]'";
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll();
    if ($results) {
        session_regenerate_id();
        $results = $results[0];
        echo "Logged in";
        echo "<pre>";
        print_r($results);


        // Sets all the Session variables
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['user_id'] = $results['user_id'];
        $_SESSION['account_type'] = $results['account_type'];

//        print_r($_SESSION['account_type']);


        // When logging in, sets the users question number to 1 -
        settype($_SESSION['question_number'], 'integer');
        $_SESSION['question_number'] = 1;

        echo "</pre>";
        // Redirect to index
        header("Location: index.php");
    } else {
        echo "Incorrect Login";
    }

} else if (isset($_SESSION['account_type'])) {
    $_SESSION['msg'] = "You are currently logged in as: " . $_SESSION['username'];
} else {
    $_SESSION['msg'] = "Please log in";
    header("Location: login.php");
}


?>