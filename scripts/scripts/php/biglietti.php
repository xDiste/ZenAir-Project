<?php
session_start();
$campi = array('partenza', 'destinazione' , 'trip-start');

foreach($campi as $c) {
    if(!isset($_POST[$c]) || empty($_POST[$c])) {
        header('Location: ../permissionDenied.php');
        return;
    }
}

    require('./searchTrip.php');
    $res = getResultSearch($_POST["partenza"], $_POST["destinazione"], $_POST["trip-start"]);
    if($res->num_rows > 0){
        echo '
            <table class="table table-striped table-dark w-auto">
                <thead>
                    <tr>
                        <th scope="col">Compagnia</th>
                        <th scope="col ">Partenza</th>
                        <th scope="col">Meta</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ora</th>
                        <th scope="col">Acquista</th>
                    </tr>
                </thead>
                <tbody>';
        while($row = $res->fetch_assoc()) {
            echo'<tr class="tableTripValue">
                <th scope="row"><img class="alitalia-icon" src="./immagini/biglietti/Alitalia.png"></img></th>
                    <td> '. $row['partenza'] . '</td>
                    <td>' . $row['destinazione'] . '</td>
                    <td>' . $row['dataPartenza'] . '</td>
                    <td>' . $row['oraPartenza'] . '</td>
                    <td><a href="./scripts/php/addCart.php?id='. $row['id'] .'&quantita='. $_POST['quantita'] .'"> <img class="cart-icon" src="./immagini/cart/cart.png"> </img> </a> </td>
                </tr>';  
        }
        echo "</tbody>
            </table>";
    }
    else{
        echo '<h1>Ci dispiace non abbiamo trovato un risultato per i voli cercati. </h1>
        <h2>Riprova con un\'altra data</h2>';
        $res->free_result();
    }
?>