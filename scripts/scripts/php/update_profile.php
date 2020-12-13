<?php
session_start();
if(!isset($_SESSION['email']) || (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@admin.admin')) header('Location: ./permissionDenied.php');
require_once("DBconnect.php");
$conn = connectDB();

$email = $conn->real_escape_string($_POST['email']);
$firstname = $conn->real_escape_string($_POST['firstname']);
$lastname = $conn->real_escape_string($_POST['lastname']);

if(!empty($_POST['pass'])){
    
    $pass = password_hash($conn->real_escape_string($_POST['pass']), PASSWORD_DEFAULT);
}
else if(empty($_POST['pass'])){
    
    $queryPass = 'SELECT Password FROM Users WHERE Email = ?';

    if(!$stmt = $conn->prepare($queryPass)){
        echo "errore di connessione riprova piu tardi";
    }   
    if(!$stmt->bind_param('s', $temp)){
        echo "Binding parameters failed: (" . $conn->errno . ") " . $conn->error;
    }
    $temp = $_SESSION['email'];
    
    if(!$stmt->execute()){
        echo "Execute failed: (" . $conn->errno . ") " . $conn->error;
    }
    
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $pass = $row['Password'];
    
}

//controllo che tutti i campi siano compilati
$campi = array('firstname', 'lastname', 'email');
foreach($campi as $c) {
   if(!isset($_POST[$c]) || empty($_POST[$c])) {
    header('Location: ../../show_profile.php');
    return;
   }
}

$newsletter = $_POST['newsletter'];
if ($newsletter != 'Si') {
    $newsletter = 0;
}
else{
    $newsletter = 1;
}

$query = 'UPDATE Users SET email = ? , firstName = ?, lastName = ?, Password = ?, newsValue = ? WHERE id = '. $_SESSION['id'];

if(!$stmt = $conn->prepare($query)){
    echo "errore di connessione riprova piu tardi";
}   
if(!$stmt->bind_param('sssss', $email, $firstname, $lastname, $pass, $newsletter)){
    echo "Binding parameters failed: (" . $conn->errno . ") " . $conn->error;
}
if(!$stmt->execute()){
    echo "Execute failed: (" . $conn->errno . ") " . $conn->error;
}
$conn->close();
    
$_SESSION['email'] = $email;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;

header('Location: ../../index.php');

?>