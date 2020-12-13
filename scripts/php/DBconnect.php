<?php


function connectDB(): mysqli {
    $servername = "webdev19.dibris.unige.it";
    $username = "S4638131@webdev19.dibris.unige.it";
    $password = "AmiconiDiSaw2021";
    $dbname = "S4638131";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed");
    }
    return $conn;
}
?>