<?php


function connectDB(): mysqli {
    $servername = "localhost";
    $username = "administrator";
    $password = "password";
    $dbname = "progettoSaw";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed");
    }
    return $conn;
}
?>