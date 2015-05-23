<?php
require("authenticate.php");
include("dbconnect.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['answer'])) {
    $sql = "SELECT * FROM questions WHERE '$_SESSION[question_number]'";
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll();
    $results = $results[0];
    if ($results['answer'] == $_POST['answer']) {
//        echo "Answer is correct!";
        // Increase question number by 1
        $_SESSION['question_number'] += 1;
        header("Location: game.php");
    } else {
        echo "Incorrect!";
    }
}
?>