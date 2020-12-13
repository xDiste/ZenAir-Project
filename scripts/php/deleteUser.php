<?php
session_start();
if(isset($_SESSION['id'])){
    require_once("DBconnect.php");
    $conn = connectDB();

    $queryAdd = 'DELETE FROM Users WHERE id = ?';

    if(!$stmt = $conn->prepare($queryAdd)){
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        }

    if(!$stmt->bind_param('s', $idUser)){
         echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $idUser = $conn->real_escape_string($_GET['id']);

    if(!$stmt->execute()){
        $conn->close();
        echo "Qualcosa è andato storto! ".$stmt->errorno;
    }
    else{
        $conn->close();
        header('Location: ../../administrator.php');
    }
}
else{
    header('Location: ../../index.php');
}


?>