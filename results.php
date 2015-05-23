<?php
include("dbconnect.php");
session_start();
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>ABCorD - Results</title>
</head>
<body>

<?php

$sql = "SELECT COUNT(*) FROM results WHERE user_id = '$_SESSION[user_id]'";
foreach ($dbh->query($sql) as $result) {
    echo "$result[correct]<br/>";
}

$stmt = $dbh->query($sql);
$results = $stmt->fetchAll();

echo "<pre>";
print_r($results);
echo "</pre>";

?>

</body>
</html>