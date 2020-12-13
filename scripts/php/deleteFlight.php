<?php
session_start();
if(isset($_SESSION['id'])){
    require_once("DBconnect.php");
    $conn = connectDB();

    $queryAdd = 'DELETE FROM voli WHERE id = ?';

    if(!$stmt = $conn->prepare($queryAdd)){
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        }

    if(!$stmt->bind_param('s', $id)){
         echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $id = $conn->real_escape_string($_GET['id']);

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