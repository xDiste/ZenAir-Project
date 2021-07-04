<?php
session_start();

if(isset($_SESSION['id'])) {
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);
    unset($_SESSION['administrator']);
    session_destroy();
    header('Location: ../../index.php');
    exit();
}else  {header('Location: ../../index.php');exit();}

?>