<?php
function checkFields($campi, $URL){
    foreach($campi as $c) {
        if(!isset($_POST[$c]) || empty($_POST[$c])) {
             $state = "Inserire tutti i campi";
             header('Location: '. "$URL" . "$state");
             exit();
        }
     }
    return;
}

function checkData($name,$email,$surname,$pass) {

    $textError = "";
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $textError = $textError . "Formato dell'email non valido. ";
     }
    if (!empty($name) && !preg_match("/^[a-zA-Z-' ]*$/", $name)) {
        $textError = $textError . "Sono consentite solo lettere e spazi per il nome. ";
    }
    if (!empty($surname) && !preg_match("/^[a-zA-Z-' ]*$/", $surname)) {
        $textError= $textError . "Sono consentite solo lettere e spazi per il cognome. ";
    }
    if(!empty($pass) && strlen($pass) < 8) {
        $textError= $textError . "La lunghezza minima della password è 8 caratteri. ";
    } 
    return $textError;
}

function extractData(){
    if(isset($_SESSION['administrator']) && $_SESSION['administrator'] != 0){
        require_once('./../DBconnect.php');
        $conn = connectDB();
        
        if(!$res = $conn->query('SELECT MONTH(mese) FROM Users')){
            echo "Qualcosa è andato storto, riprova più tardi";
            exit();
        }
        $conn->close();
        $monthArray = array(0, 0, 0, 0, 0, 0);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                if(!empty($row['MONTH(mese)'])){
                    switch ($row['MONTH(mese)']) {
                        case 1:
                        case 2: 
                            ++$monthArray[0];
                        break;
                        case 3:
                        case 4:
                            ++$monthArray[1];
                        break;
                        case 5:
                        case 6:
                            ++$monthArray[2];
                        break;
                        case 7:
                        case 8:
                            ++$monthArray[3];
                            break;
                        case 9:
                        case 10:
                            ++$monthArray[4];
                            break;
                        case 11:
                        case 12:
                            ++$monthArray[5];
                            break;
                        default:
                        echo 'Mese non identificato';
                    }
                }
            }
        }
        return $monthArray;
    }
}

function validateDate($date){
    //controllo la data con format "Y/m/d"
    return preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date);
}

function searchTrip($partenza, $destinazione, $tripStart, $quantita) {
    require_once("./../../../DBconnect.php");
    $conn = connectDB();
    
    $query = 'SELECT id, partenza, destinazione, dataPartenza, oraPartenza, prezzo 
    FROM voli WHERE partenza = ? AND destinazione = ?  AND dataPartenza = ? AND nBiglietti >= ? AND nBiglietti > 0
    OR (destinazione = ? AND partenza= ? AND dataPartenza > ?) ORDER BY prezzo LIMIT 10';
    
    if(!$stmt = $conn->prepare($query)){
        echo "Qualcosa è andato storto, riprova più tardi";
        exit();
    }
    if(!$stmt->bind_param('sssssss', $partenza, $destinazione, $tripStart, $quantita, $partenza, $destinazione, $tripStart)){
        echo "Qualcosa è andato storto, riprova più tardi";
        exit();
    }
    if(!$stmt->execute()){
        echo "Qualcosa è andato storto, riprova più tardi";
        exit();
    }
    $res = $stmt->get_result();
    $conn->close();
    return $res;
}
?>