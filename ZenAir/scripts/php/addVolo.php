<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['administrator'] != 0){
    require_once("./../../../DBconnect.php");
    $conn = connectDB();
    $failure= "Operazione non riuscita!";

    $queryAdd = 'INSERT INTO voli ( partenza, destinazione, dataPartenza, oraPartenza, prezzo, nBiglietti) VALUES ( ?, ?, ?, ?, ?, ?)';

    if(!$stmt = $conn->prepare($queryAdd)){
        header('Location: ../../administrator.php?state=' . $failure);
        exit();
    }
    if(!$stmt->bind_param('ssssss' ,$partenza, $destinazione, $dataPartenza, $oraPartenza, $prezzo, $nBiglietti)){
        header('Location: ../../administrator.php?state=' . $failure);
        exit();
    }

    $partenza = $_POST['partenza'];
    $destinazione = $_POST['destinazione'];
    $dataPartenza = $_POST['dataPartenza'];
    $oraPartenza =$_POST['oraPartenza'];
    $prezzo = $_POST['prezzo'];
    $nBiglietti = $_POST['nBiglietti'];

    if(!$stmt->execute()){
        header('Location: ../../administrator.php?state=' . $failure);
        exit();
    }
    else{
        $success= "Operazione effettuata!";
        header('Location: ../../administrator.php?state=' . $success);
        exit();
    }
}
else{
    header('Location: ../../errorPages/permissionDenied.php');
    exit();
}
?>