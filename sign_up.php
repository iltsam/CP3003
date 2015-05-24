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
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br/>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
        <br/>
        <label for="firstname">First Name: </label>
        <input type="text" name="firstname" id="firstname">
        <br/>
        <label for="lastname">Last Name: </label>
        <input type="text" name="lastname" id="lastname">
        <br/>
        <label for="class">Class: </label>
        <input type="text" name="class" id="class">
        <br/>
        <input type="submit" name="submit" value="Submit">
    </form>
<?php } ?>
</body>
</html>