<?php
session_start();
if(isset($_SESSION['id'])){
    require_once("DBconnect.php");
    $conn = connectDB();

    $queryAdd = 'DELETE FROM Carrello WHERE idUser = ? AND idVolo = ?';

    if(!$stmt = $conn->prepare($queryAdd)){
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        }

    if(!$stmt->bind_param('ss', $idUser, $idVolo)){
         echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $idUser = $conn->real_escape_string($_GET['idUser']);
    $idVolo = $conn->real_escape_string($_GET['idVolo']);

    if(!$stmt->execute()){
        $conn->close();
        echo "Qualcosa è andato storto! ".$stmt->errorno;
    }
    else{
        $conn->close();
        header('Location: ../../carrello.php');
    }
}
else{
    header('Location: ../../index.php');
}
?>