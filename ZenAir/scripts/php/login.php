<?php
if(isset($_POST['submit'])) {
    require_once('./utils.php');
    $campi = array('email', 'pass');

    checkFields($campi, '../../log-in.php?error=');

    require_once("./../../../DBconnect.php");
    $conn = connectDB();

    
    $email = $_POST['email'];
    $password = $_POST['pass'];

    //validazione lato server 
    $errorText = checkData("",$email,"",$password);
    if(!empty($errorText)){
        $state = urlencode($errorText);
        header('Location: ../../log-in.php?error='. $state);
        exit();
    }



    $sql = 'SELECT * FROM Users WHERE email = ?';

    if(!$stmt = $conn->prepare($sql)){
        echo "errore di connessione riprova piu tardi";
        exit();
    }
    if(!$stmt->bind_param('s', $email)){
        echo "Binding parameters failed: (" . $conn->errno . ") " . $conn->error;
        exit();
    }
    if(!$stmt->execute()){
        echo "Execute failed: (" . $conn->errno . ") " . $conn->error;
        exit();
    }
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();
    $conn->close();

    if($res->num_rows != 1){
        $state = "password o email errate";
        header('Location: ../../log-in.php?error=' . $state);
        exit();
    }

    if(password_verify($password, $row['password'])) {
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstName'];
        $_SESSION['lastname'] = $row['lastName'];
        $_SESSION['administrator'] = $row['administrator'];

        if($_SESSION['administrator'] != 0){
            header('Location: ../../administrator.php');
            exit();
        }
        else{
            header('Location: ../../index.php');
            exit();
        } 
    }
    else{
        $state = "Attenzione controllare i dati inseriti";
        header('Location: ../../log-in.php?error='.$state);
        exit();
    }
}else{
    header('Location: ../../errorPages/permissionDenied.php');
    exit();
}
?>