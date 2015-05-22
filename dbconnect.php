<?php

try {
    $dbh = new PDO("sqlite:ABCorD.sqlite");
    echo "Database connection all good";
} catch (PDOException $e){
    echo $e->getMessage();
}
?>
