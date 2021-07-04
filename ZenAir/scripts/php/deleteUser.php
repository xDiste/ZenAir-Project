<?php
session_start();
if(isset($_SESSION['administrator']) && $_SESSION['administrator'] != 0){
    require_once("./../../../DBconnect.php");
    $conn = connectDB();

    $queryAdd = 'DELETE FROM Users WHERE id = ?';

    $failure = "Eliminazione negata!";
    if(!$stmt = $conn->prepare($queryAdd)){
        header('Location: ../../administrator.php'. "?state= " .$failure);
        exit();
    }

    if(!$stmt->bind_param('s', $idUser)){
        header('Location: ../../administrator.php'. "?state= " .$failure);
        exit();
    }
    $idUser = htmlspecialchars($_GET['id']);

    if(!$stmt->execute()){
        header('Location: ../../administrator.php'. "?state= " .$failure);
        exit();
    }
    else{
        $success = "Elminazione avvenuta con successo";
        header('Location: ../../administrator.php'. "?state= " . $success);
        exit();
    }
}
else{
    header('Location: ../../index.php');
    exit();
}


?>