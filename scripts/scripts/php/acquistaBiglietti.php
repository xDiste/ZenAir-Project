<?php
session_start();
require_once("DBconnect.php");
$conn = connectDB();

$query = 'DELETE FROM Carrello WHERE idUser = '.$_SESSION['id'].'';
if(!$stmt = $conn->prepare($query)){
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}
if(!$stmt->execute()){
    echo "Qualcosa è andato storto! ".$stmt->errorno;
}
$conn->close();

header('Location: ../../carrello.php');
?>