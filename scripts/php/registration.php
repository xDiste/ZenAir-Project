<?php
session_start();
require_once("DBconnect.php");

$conn = connectDB();
//controllo che tutti i campi siano riempiti
$campi = array('firstname', 'lastname', 'email', 'pass', 'confirm');
foreach($campi as $c) {
   if(!isset($_POST[$c]) || empty($_POST[$c])) {
        $_GET['error'] = "Inserire tutti i campi";
        header('Location: ../../reg.php?error=' . "$_GET[error]");
        return;
   }
}


$firstname = $conn->real_escape_string($_POST["firstname"]);
$lastname = $conn->real_escape_string($_POST["lastname"]);
$mail = $conn->real_escape_string($_POST["email"]);
$pass = $conn->real_escape_string($_POST["pass"]);
$passConfirm= $conn->real_escape_string($_POST["confirm"]);
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);



$newsletter = $_POST['newsletter'];
if ($newsletter != 'Si') {
    $newsletter = 0;
}
else{
    $newsletter = 1;
}


$sql =  "SELECT * FROM Users WHERE Email= ?";


if(!$stmt = $conn->prepare($sql)){
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}
if(!$stmt->bind_param('s',$Email)){
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}
$Email = $mail;
if(!$stmt->execute()){
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$stmt->store_result();


if($stmt->num_rows > 0){
    $_GET['error'] = "Indirizzo email già in uso";
    header('Location: ../../reg.php?error=' . "$_GET[error]");
    return;
}

$sql = "INSERT INTO Users (firstName, lastName, email, password, newsValue) VALUES ('$firstname', '$lastname', '$Email', '$hashed_password', '$newsletter')";
if(!$stmt = $conn->prepare($sql)){
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}

if(!$stmt->execute()){
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}

$conn->close();

header('Location: ../../index.php');

?>