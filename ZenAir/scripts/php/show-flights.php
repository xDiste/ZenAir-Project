<?php
session_start();
if(isset($_SESSION['administrator']) && $_SESSION['administrator'] != 0){
    require_once("./../../../DBconnect.php");
    require_once('../../globalVariables.php');
    $conn = connectDB();
    
    if(!$res = $conn->query('SELECT * FROM voli')){
        echo 'Errore nella visualizzazione dei voli';
    }
    
    $conn->close();
    echo '
    <form class="form-style" id="addVolo" action="'; echo $GLOBALS['baseUrl'].'/scripts/php/addVolo.php" method=POST>

        <div class="form-group">    
            <input id="partenza" name="partenza" type="text" class="form-control" placeholder="Partenza" required>
        </div>
        <div class="form-group">
            <input id="destinazione" name="destinazione" type="text" class="form-control " placeholder="Destinazione" required>
        </div>
        <div class="form-group">    
            <input id="dataPartenza" name="dataPartenza" type="date" class="form-control " placeholder="Data della partenza" required>
        </div>
        <div class="form-group">
            <input id="oraPartenza" name="oraPartenza" type="time" class="form-control" placeholder="Ora della partenza" required>
        </div>
        <div class="form-group">    
            <input id="prezzo" name="prezzo" type="text" class="form-control" placeholder="Prezzo" required>
        </div>
        <div class="form-group">    
            <input id="nBiglietti" name="nBiglietti" type="text" class="form-control" placeholder="Numero Biglietti" required>
        </div>
        <button name="submit" type="submit" class="btn btn-success">Aggiungi</button>
    </form>';


    echo '<h1 class="cent-title">Lista voli</h1>';
    if($res->num_rows > 0){
        echo '
            <table class="table table-striped table-dark w-auto">
                <thead>
                    <tr>
                        <th scope="col">idVolo</th>
                        <th scope="col">Partenza</th>
                        <th scope="col">Meta</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ora</th>
                        <th scope="col">Prezzo (€)</th>
                        <th scope="col">Rimuovi</th>
                    </tr>
                </thead>
                <tbody>';
        while($row = $res->fetch_assoc()) {
            echo'<tr class="tableTripValue">
                <th scope="row">'. $row['id'] .'</th>
                    <td> '. $row['partenza'] . '</td>
                    <td>' . $row['destinazione'] . '</td>
                    <td>' . $row['dataPartenza'] . '</td>
                    <td>' . $row['oraPartenza'] . '</td>
                    <td>' . $row['prezzo'] . '</td>
                    <td><a href="./scripts/php/deleteFlight.php?id='.$row['id'].'"><img class="alitalia-icon" src="'; echo $GLOBALS['baseUrl'].'/immagini/adminIcon/minus.svg"></img></a></td>
                </tr>';  
        }
        echo "</tbody>
            </table>";
    }
    else{            
        $res->free_result();
    }

}else{ Header('Location: ../../componenti/accessoNegato.php'); exit();}
?>