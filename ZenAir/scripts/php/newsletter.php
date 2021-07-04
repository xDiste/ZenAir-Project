<?php

require_once('./utils.php');
$campi = array('subject', 'body');

checkFields($campi, '../../administrator.php?state=');

require_once('./../../../DBconnect.php');
use PHPMailer\PHPMailer\PHPMailer;
require_once 'PHPMailer/src/PHPMailer.php';
require_once "PHPMailer/src/SMTP.php";
require_once "PHPMailer/src/Exception.php";
$conn = connectDB();
$mail = new PHPMailer();

//SMTP Settings account della mail dove bisogna loggarsi
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
//credenziali --> email: compAerea12@gmail.com passwd: progettosaw
$mail->Username = "compAerea12@gmail.com";
$mail->Password = 'progettosaw';
$mail->Port = 465; //587
$mail->SMTPSecure = "ssl"; //tls
//Email Settings dati destinatario 
$mail->isHTML(true);
$mail->setFrom('compAerea12@gmail.com', 'compAerea');

$subject = htmlspecialchars($_POST['subject']);
$body = htmlspecialchars($_POST['body']);

$mail->Subject = $subject;
$mail->Body = $body;

$sql = "SELECT email FROM Users WHERE newsValue = 1 ";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if(!empty($row['email'])){
            $mail->addAddress($row['email']);
            if ($mail->send()) {
                $status = "success";
                $response = "Email mandata!"; 
            
            } else {
                $status = "failed";
                $response = "Qualcosa è andato storto: <br><br>" . $mail->ErrorInfo;
            }
        }
    }
}

$mail->clearAllRecipients();

$conn->close();
$state = $response;
header('Location: ../../administrator.php'. "?state= " . $state);
exit();

?>