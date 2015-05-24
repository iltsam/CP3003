<?php include("dbconnect.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="res/mainstyles.css">
    <title>Sign Up</title>
</head>
<body>
<div class="container" id="container">
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
    <div class="contentContainer">

<?php
    if(isset($_POST['username'])) {
        $sql = "INSERT INTO user_accounts (username, password, firstname, lastname, class, email) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[class]', '$_POST[email]')";
        $dbh->query($sql);
        echo "Sign up complete!<br/><a href='login.php'>Login Now!</a>";
    } else if (isset($_SESSION['username'])){
        echo "You are already logged in: " . $_SESSION['username'];
    } else {

?>
    <form name="sign_up" method="post" action="sign_up.php">
        <label for="username">Username: </label>
        <input type="text" name="username" id="username">
        <br/>
        <br/>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br/>
        <br/>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <br/>
        <br/>
        <label for="firstname">First Name: </label>
        <input type="text" name="firstname" id="firstname">
        <br/>
        <br/>
        <label for="lastname">Last Name: </label>
        <input type="text" name="lastname" id="lastname">
        <br/>
        <br/>
        <label for="class">Class: </label>
        <input type="text" name="class" id="class">
        <br/>
        <br/>
        <input type="submit" name="submit" value="Submit">
    </form>
<?php } ?>
        <footer>
            <div class="footer">

            </div>
        </footer>
        </div>
        </div>
</body>
</html>