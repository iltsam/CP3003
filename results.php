<?php session_start();
include("dbconnect.php");
require("authenticate.php");
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="res/mainstyles.css">
    <title>ABCorD - Results</title>
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
        <?php
        if ($_SESSION['account_type'] == "student") {
            $sql = "SELECT * FROM results WHERE user_id = '$_SESSION[user_id]'";
            echo "<h1>Results for: " . $_SESSION['username'] . "</h1>"; ?>
            <table>
                <tr>
                    <th>Question Number</th>
                    <th>Correct</th>
                </tr>
                <?php
                $results = $dbh->query($sql);
                if (!$results) {
                    echo "There are no results";
                }
                foreach ($results as $row) {
                    echo "<tr><td>Question $row[question_number]</td><td>$row[correct]</td></tr>";
                }
                ?>
            </table>
        <?php
        }
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