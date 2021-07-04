<?php
session_start();
if(isset($_SESSION['id'])) {

    require_once("./../../../DBconnect.php");
    $conn = connectDB();

    if(!$conn->query('DELETE FROM Carrello WHERE idUser = '.$_SESSION['id'].'')){
        echo 'Errore nell\'acquisto del biglietto';
    }

    $conn->close();
}

header('Location: ../../carrello.php');
exit();
?>