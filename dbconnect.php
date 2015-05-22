<?php

try {
    $dbh = new PDO("sqlite:ABCorD.sqlite");
} catch (PDOException $e){
    echo $e->getMessage();
}
?>
