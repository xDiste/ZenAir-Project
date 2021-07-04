<?php

session_start();
if(!isset($_SESSION['email']) || (isset($_SESSION['email']) && $_SESSION['administrator'] != 0)) header('Location: ./errorPages/permissionDenied.php');

require_once('./utils.php');

$campi = array('firstname', 'lastname', 'email');
checkFields($campi, './show_profile.php?error=');

require_once("./../../../DBconnect.php");
$conn = connectDB();

$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

if(!empty($_POST['pass'])){
    $checkPass = $_POST['pass'];
    $pass = password_hash(($_POST['pass']), PASSWORD_DEFAULT);

}else if(empty($_POST['pass'])){
    
    $queryPass = 'SELECT Password FROM Users WHERE Email = ?';

    if(!$stmt = $conn->prepare($queryPass)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }   
    if(!$stmt->bind_param('s', $temp)){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    $temp = $_SESSION['email'];
    
    if(!$stmt->execute()){
        header('Location: ../../errorPages/somethingWrong.php');
        exit();
    }
    
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $pass = $row['Password'];
}

$errorText = checkData($firstname,$email,$lastname,$checkPass);
if(!empty($errorText)){
    $state = urlencode($errorText);
    header('Location: ./show_profile.php?error='. $state);
    exit();
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
    header('Location: ../../errorPages/somethingWrong.php');
    exit();
}   
if(!$stmt->bind_param('sssss', $email, $firstname, $lastname, $pass, $newsletter)){
    header('Location: ../../errorPages/somethingWrong.php');
    exit();
}
if(!$stmt->execute()){
    header('Location: ../../errorPages/somethingWrong.php');
    exit();
}
$conn->close();
    
$_SESSION['email'] = $email;
$_SESSION['firstname'] = $firstname;
$_SESSION['lastname'] = $lastname;

header('Location: ../../index.php');
exit();

?>