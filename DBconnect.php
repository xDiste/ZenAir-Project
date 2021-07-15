<?php


function connectDB(): mysqli {
    $servername = "localhost";
    $password = "password";
    $dbname = "dbname";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed");
    }   
    return $conn;
}
?>
