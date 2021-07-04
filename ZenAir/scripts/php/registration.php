<?php
require_once('./utils.php');
//controllo che tutti i campi siano riempiti
$campi = array('firstname', 'lastname', 'email', 'pass', 'confirm');
checkFields($campi, '../../reg.php?error=');
require_once("./../../../DBconnect.php");

$conn = connectDB();


$mail = $_POST["email"];

$errorText = checkData("",$mail,"","");
if(!empty($errorText)){
    $state= urlencode(strval($errorText));
    header('Location: ../../reg.php?error='. $state);
    exit();
}
else{
    $newsletter = $_POST['newsletter'];
    if ($newsletter != 'Si') {
        $newsletter = 0;
    }
    else{
        $newsletter = 1;
    }

    $sql =  "SELECT * FROM Users WHERE Email= ?";

    if(!$stmt = $conn->prepare($sql)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    if(!$stmt->bind_param('s',$Email)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    $Email = $mail;

    if(!$stmt->execute()){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    $stmt->store_result();

    if($stmt->num_rows > 0){
        $state = "Indirizzo email già in uso";
        header('Location: ../../reg.php?error=' . "$state");
        exit();
    }

    $sql = "INSERT INTO Users (firstName, lastName, email, password, newsValue) VALUES (?, ?, ?, ?, ?)";
    if(!$stmt = $conn->prepare($sql)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    if(!$stmt->bind_param('sssss', $firstname,$lastname,$Email,$hashed_password, $newsletter)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $pass = $_POST["pass"];
    $passConfirm= $_POST["confirm"];
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    $Email = $mail;
    
    $errorText = checkData($firstname,"",$lastname,$pass);
    if(!empty($errorText)){
        $state= urlencode(strval($errorText));
        header('Location: ../../reg.php?error='.  $state);
        exit();
    }

    if(!$stmt->execute()){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }

    $conn->close();

    header('Location: ../../index.php');
    exit();
}
?>