<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="res/mainstyles.css">
    <title>ABCorD - Login</title>
</head>
<body>
<div class="container">
<header id="banner">
    <h1>Operation Fun Learning</h1>
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
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
        }
        if (!isset($_SESSION['account_type'])) {


        ?>

        <form name="login" method="post" action="authenticate.php">
            <label for="username">Username: </label>
            <input type="text" name="username">
            <br/>
            <label for="password">Password: </label>
            <input type="password" name="password">
            <br/>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php } ?>
    </div>
    <footer>
        <div class="footer">

        </div>
    </footer>

</div>
</body>
</html>