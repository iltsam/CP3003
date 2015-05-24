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

<?php
if (isset($_SESSION['question_set'])) {
    $sql = "SELECT * FROM questions WHERE question_set = '$_SESSION[question_set]'";
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll();
    $results = $results[0];

} else {
    echo "Please select a set of questions...";
}

echo "<form name=\"game\" method=\"post\" action=\"answer_check.php\">
    <table>
    <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a1]\">$results[a1]</td></tr>
    <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a2]\">$results[a2]</td></tr>
    <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a3]\">$results[a3]</td></tr>
    <tr><td><input type=\"radio\" name=\"answer\" value=\"$results[a4]\">$results[a4]</td></tr>
    <tr><td><input type=\"submit\" name=\"submit\"></td></tr>
    </table>
    </form>"
?>
</body>
</html>