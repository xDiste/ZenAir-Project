<?php
session_start();
$campi = array('partenza', 'destinazione' , 'trip-start');

foreach($campi as $c) {
    if(!isset($_POST[$c]) || empty($_POST[$c])) {
        echo '<h1 class="cent-title">Attenzione compilare i campi</h1>';
        return;
    }
}
require_once('./utils.php');
//controlliamo che il campo quantità sia un numero e che la data sia valida oltre che futura alla data odierna
if(!is_numeric($_POST["quantita"]) || !validateDate($_POST["trip-start"]) || (date("Y/m/d") < $_POST["trip-start"])){
    echo'<h1 class="cent-title">Attenzione dati inseriti non validi</h1>';
    return;
}

$res = searchTrip($_POST["partenza"], $_POST["destinazione"], $_POST["trip-start"], abs($_POST["quantita"]));
if($res->num_rows > 0) {
    echo '
        <table class="table table-striped table-dark w-auto">
            <thead>
                <tr>
                    <th scope="col">Codice volo</th>
                    <th scope="col">Partenza</th>
                    <th scope="col">Meta</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Prezzo</th>
                    <th scope="col">Acquista</th>
                </tr>
            </thead>
            <tbody>';
    while($row = $res->fetch_assoc()) {
        echo'<tr class="tableTripValue">
            <th scope="row">'.$row['id'].'</th>
                <td> '. $row['partenza'] . '</td>
                <td>' . $row['destinazione'] . '</td>
                <td>' . $row['dataPartenza'] . '</td>
                <td>' . $row['oraPartenza'] . '</td>
                <td>' . $row['prezzo'] . '</td>
                <td><a href="./scripts/php/addCart.php?id='. $row['id'] .'&quantita='. $_POST['quantita'] .'"> <img class="cart-icon" src="./immagini/cart/cart.png"> </img> </a> </td>
            </tr>';  
    }
    echo "</tbody>
        </table>";
}
else{
    echo '<h1 class="cent-title">Ci dispiace non abbiamo trovato un risultato per i voli cercati. Riprova con un\'altra data </h1>';
    $res->free_result();
}
?>