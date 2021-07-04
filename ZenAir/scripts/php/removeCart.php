<?php
session_start();
if(isset($_SESSION['id'])){
    require_once("./../../../DBconnect.php");
    $conn = connectDB();

    $query = 'UPDATE voli SET nBiglietti = nBiglietti + ?  WHERE id = ?';
    if(!$stmt = $conn->prepare($query)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    if(!$stmt->bind_param('ss', $quantita, $idVolo)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    $idVolo = htmlspecialchars($_GET['idVolo']);
    $quantita = htmlspecialchars(abs($_GET['quantita']));
    
    if(!$stmt->execute()){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    $queryAdd = 'DELETE FROM Carrello WHERE idUser = ? AND idVolo = ?';

    if(!$stmt = $conn->prepare($queryAdd)){
            header('Location: ../../errorPages/somethingWrong.php');
            exit();
        }

    if(!$stmt->bind_param('ss', $idUser, $idVolo)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    $idUser = htmlspecialchars($_GET['idUser']);

    if(!$stmt->execute()){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    else{
        header('Location: ../../carrello.php'); 
        exit();
    }
}
else{
    header('Location: ../../index.php');
    exit(); 
}
?>