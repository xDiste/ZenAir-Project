<?php
require_once("DBconnect.php");
$conn = connectDB();

$query = 'SELECT * FROM Carrello JOIN voli ON idVolo = voli.id WHERE idUser = ' . $_SESSION['id'] .'';
if(!$stmt = $conn->prepare($query)){
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}
if(!$stmt->execute()){
    echo "Qualcosa è andato storto! ".$stmt->errorno;
}

$res = $stmt->get_result();

$totale = 0;
$nBiglietti = 0;
/* totale = quantità : Carrello * prezzoBase : Voli*/
if ($res->num_rows > 0){
    while($row = $res->fetch_assoc()) {
        $amount = $row['quantita'];
        $price = $row['prezzo'];
        $totale += $row['quantita'] * $row['prezzo'];
        $nBiglietti += $row['quantita'];
    }
    $res->data_seek(0);
}

$conn->close();
?>


