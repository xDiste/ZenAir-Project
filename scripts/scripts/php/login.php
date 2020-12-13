<?php
if(isset($_POST['submit'])){
    require_once("DBconnect.php");
    $conn = connectDB();
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['pass']);

    $campi = array('email', 'pass');
    // 
    foreach($campi as $c) {
        if(!isset($_POST[$c]) || empty($_POST[$c])) {
            $_GET['error'] = "password o email non inserita";
            header('Location: ../../log-in.php?error=' . $_GET['error']);
            return;
        }
    }

    $sql = 'SELECT id, firstName, lastName, email, password FROM Users WHERE email = ?';

    if(!$stmt = $conn->prepare($sql)){
        echo "errore di connessione riprova piu tardi";
    }
    if(!$stmt->bind_param('s', $email)){
        echo "Binding parameters failed: (" . $conn->errno . ") " . $conn->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: (" . $conn->errno . ") " . $conn->error;
    }
    $res = $stmt->get_result();
    
    $row = $res->fetch_assoc();

    if($res->num_rows != 1){
        header('Location: ../../PermissionDenied.php');
    }

    $conn->close();
   
    if(password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstName'];
        $_SESSION['lastname'] = $row['lastName'];

        if($_SESSION['email'] == "admin@admin.admin"){
            header('Location: ../../administrator.php');
        }
        else{
            header('Location: ../../index.php');
        } 
    }
    else{
        $_GET['error'] = "Password inserita non valida";
        header('Location: ../../log-in.php?error='.$_GET['error']);
        return;
    }
}else{
    header('Location: ../../PermissionDenied.php');
}
?>