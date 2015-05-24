<?php
require("authenticate.php");
include("dbconnect.php");
session_start();
$_SESSION['question_set'] = 'math'
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="res/mainstyles.css">
    <title>ABCorD - Game</title>
</head>
<body>
<div class="container">
    <header id="banner">
        <h1 class="title">Operation Fun Learning</h1>
    </header>
    <nav id="navBar">
        <a class="navButton" href="index.php">Home</a>
        <a class="navButton" href="results.php">Results</a>
        <?php
        if (!isset($_SESSION['account_type'])){
            echo "<a class='navButton' href='sign_up.php'>Sign Up</a>";
            echo "<a class='navButton' href='login.php'>Login</a>";
        } else {
            echo "<a class='navButton' href='game.php'>Play Now!</a>";
            echo "<a class='navButton' href='logout.php'>Logout</a>";
        }
        ?>
    </nav>
    <div id="contentContainer">
        <h1>ABCorD</h1>
        <?php
        if (isset($_SESSION['question_set'])) {
            echo $_SESSION['msg'];
            $sql = "SELECT * FROM questions WHERE question_set = '$_SESSION[question_set]' AND question_number = '$_SESSION[question_number]'";
            $stmt = $dbh->query($sql);
            $results = $stmt->fetchAll();
            $results = $results[0];

        } else {
            echo "Please select a set of questions...";
        }
        echo "<h3>Question $_SESSION[question_number]: $results[question]</h3>";
        echo "<form name=\"game\" method=\"post\" action=\"answer_check.php\">
            <table>
            <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a1]\">A: $results[a1]</td></tr>
            <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a2]\">B: $results[a2]</td></tr>
            <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a3]\">C: $results[a3]</td></tr>
            <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a4]\">D: $results[a4]</td></tr>
            <tr><td><input type=\"submit\" name=\"submit\"></td></tr>
            </table>
            </form>"
        ?>
    </div>
    <footer>
        <div class="footer">
            <h3>Contact Us</h3>
            <ul>
                <li>Email: Email@Email.com</li>
                <li>Ph. 0400 000 000</li>
            </ul>
        </div>
    </footer>
</div>
</body>
</html>