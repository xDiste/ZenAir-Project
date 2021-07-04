<?php
require_once("./../DBconnect.php");
$conn = connectDB();

if(!$res = $conn->query('SELECT * FROM Carrello JOIN voli ON idVolo = voli.id WHERE idUser = ' . $_SESSION['id'] . '')){
    header('Location: ./errorPages/somethingWrong.php');
    exit();
}

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


