<?php session_start();
require("authenticate.php");
include("dbconnect.php");


echo "<pre>";
print_r($_POST);
echo "</pre>";

if (isset($_POST['answer'])) {
    $sql = "SELECT * FROM questions WHERE question_number = '$_SESSION[question_number]'";
    $stmt = $dbh->query($sql);
    $results = $stmt->fetchAll();
    $results = $results[0];
    if ($results['answer'] == $_POST['answer']) {
        $sql = "INSERT OR REPLACE INTO results (user_id, question_set, question_number, correct, user_choice)
                VALUES ('$_SESSION[user_id]', '$_SESSION[question_set]', '$_SESSION[question_number]', 'true', '$_POST[answer]')";
        $dbh->exec($sql);
//        Used for troubleshooting.
//        $_SESSION['msg'] = "This is the query: " . $sql;

        // Increase question number by 1
        $_SESSION['question_number'] = $_SESSION['question_number'] + 1;
        // If the question number exceeds the 10Q max, sends to results and sets Q_number back to 1
        if ($_SESSION['question_number'] == 11) {
            $_SESSION['question_number'] = 1;
            header("Location: results.php");
            exit();
        }
        header("Location: game.php");
    } else {
        // Used for troubleshooting
//        $_SESSION['msg'] = "WRONG Answer = " . $_POST['answer'] . "Queried answer: " . $results['answer'] . "Query Used" . $sql;

        $sql = "INSERT OR REPLACE INTO results (user_id, question_set, question_number, correct, user_choice)
                VALUES ('$_SESSION[user_id]', '$_SESSION[question_set]', '$_SESSION[question_number]', 'false', '$_POST[answer]')";
        $dbh->exec($sql);
        // Increments the question number by 1 to send to the next question.
        $_SESSION['question_number'] = $_SESSION['question_number'] + 1;
        // If the question number exceeds the 10Q max, sends to results and sets Q_number back to 1
        if ($_SESSION['question_number'] == 11) {
            $_SESSION['question_number'] = 1;
            header("Location: results.php");
            exit();
        }
        header("Location: game.php");
//        echo "Incorrect!";
    }
} else {
    header("Location: game.php");
}
?>