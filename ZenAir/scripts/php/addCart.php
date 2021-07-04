<?php
session_start();
if(isset($_SESSION['id'])){
    require_once("./../../../DBconnect.php");
    $conn = connectDB();

    // update della quantita richiesta dall'utente in "magazzino" occorre gestire concorrenza 
    // non occorre controllare la rimanenza quella viene controllata in searchTrip
    $query = 'UPDATE voli SET nBiglietti = nBiglietti - ?  WHERE id = ? and (nBiglietti - ?) >= 0';
    // se non sono riuscito a fare update ho avuto un accesso concorrente affected num rows == 0
    if(!$stmt = $conn->prepare($query)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    if(!$stmt->bind_param('sss', $quantita, $idVolo, $quantita)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    
    $idVolo = htmlspecialchars($_GET['id']);
    $quantita = htmlspecialchars(abs($_GET['quantita']));

    
    if(!$stmt->execute()){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    if($stmt->affected_rows == 0){
        $error = "I biglietti che stai cercando di acquistare sono gia stati acquistati";
        header('Location: ../../cercaBiglietti.php?error=' . $error );
        exit();
    }

    // inserimento nel carrello del biglietto
    $queryAdd = 'INSERT INTO Carrello (idUser, idVolo, quantita) VALUES (?, ?, ?)';

    if(!$stmt = $conn->prepare($queryAdd)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    if(!$stmt->bind_param('sss', $_SESSION['id'], $idVolo, $quantita)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    if(!$stmt->execute()) {
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    else{
        header('Location: ../../carrello.php');
        exit();
    }
}
else{
    header('Location: ../../errorPages/permissionDenied.php');
    exit();
}

?>