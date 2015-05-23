<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ABCorD - Login</title>
</head>
<body>

<?php
if (isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
}
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


</body>
</html>