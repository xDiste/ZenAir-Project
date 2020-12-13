<?php
$campi = array('subject', 'body');
foreach($campi as $c) {
    if(!isset($_POST[$c]) || empty($_POST[$c])) {
        header('Location: ./logout.php');
    }
}
require_once('DBconnect.php');
use PHPMailer\PHPMailer\PHPMailer;
require_once '../PHPMailer/src/PHPMailer.php';
require_once "../PHPMailer/src/SMTP.php";
require_once "../PHPMailer/src/Exception.php";
$conn = connectDB();
$mail = new PHPMailer();

//SMTP Settings account della mail dove bisogna loggarsi
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
//credenziali --> email: compAerea12 passwd: progettosaw
$mail->Username = "compAerea12@gmail.com";
$mail->Password = 'progettosaw';
$mail->Port = 465; //587
$mail->SMTPSecure = "ssl"; //tls

//Email Settings dati destinatario 
$mail->isHTML(true);
$mail->setFrom('compAerea12@gmail.com', 'compAerea');

$subject = $conn->real_escape_string($_POST['subject']);
$body = $conn->real_escape_string($_POST['body']);

$mail->Subject = $subject;
$mail->Body = $body;

$sql = "SELECT Email FROM Users WHERE newsValue = 1 ";

if(!$stmt = $conn->prepare($sql)){
    echo "Errore di connessione riprova piu tardi";
}

if(!$stmt->execute()){
    echo "Execute failed: (" . $conn->errno . ") " . $conn->error;
}

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    if(!empty($row['email'])){
        $mail->addAddress($row['email']);
        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!"; 
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    }
}
$mail->clearAllRecipients();

$conn->close();

header('Location: ../../administrator.php');

?>