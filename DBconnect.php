<?php


function connectDB(): mysqli {
    $servername = "localhost";
    $username = "S4638131";
    //$username = "administrator";
    $password = "AmiconiDiSaw2021";
    //$password = "password";
    $dbname = "S4638131";
    //$dbname = "S4638131;

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed");
    }   
    return $conn;
}
?>