<?php
session_start();
if(isset($_SESSION['id'])){
    require_once("DBconnect.php");
    $conn = connectDB();

    $queryAdd = 'INSERT INTO Carrello (idUser, idVolo, quantita) VALUES (?, ?, ?)';

    if(!$stmt = $conn->prepare($queryAdd)){
        echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
    }
    if(!$stmt->bind_param('sss', $_SESSION['id'], $idVolo, $quantita)){
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $idVolo = $conn->real_escape_string($_GET['id']);
    $quantita = $conn->real_escape_string($_GET['quantita']);

    if(!$stmt->execute()){
        $conn->close();
        echo "Qualcosa è andato storto! (".$stmt->errno.") " . $stmt->error;
    }
    else{
        $conn->close();
        header('Location: ../../carrello.php');
    }
}
else{
    header('Location: ../../permissionDenied.php');
}

?>