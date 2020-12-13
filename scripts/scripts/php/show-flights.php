<?php
session_start();
require_once("./DBconnect.php");
$conn = connectDB();

$query = 'SELECT * FROM voli';

if(!$stmt = $conn->prepare($query)){
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}
if(!$stmt->execute()){
    echo "Qualcosa è andato storto! ".$stmt->errorno;
}

$res = $stmt->get_result();

$conn->close();

if(isset($_SESSION['email']) && ($_SESSION['email'] == "admin@admin.admin")){
    echo '<h1 class="cent-title">Lista voli</h1>';
    if($res->num_rows > 0){
        echo '
            <table class="table table-striped table-dark w-auto">
                <thead>
                    <tr>
                        <th scope="col">Compagnia</th>
                        <th scope="col">Partenza</th>
                        <th scope="col">Meta</th>
                        <th scope="col">Data</th>
                        <th scope="col">Ora</th>
                        <th scope="col">Rimuovi</th>
                    </tr>
                </thead>
                <tbody>';
        while($row = $res->fetch_assoc()) {
            echo'<tr class="tableTripValue">
                <th scope="row"><img class="alitalia-icon" src="./immagini/Alitalia.png"></img></th>
                    <td> '. $row['partenza'] . '</td>
                    <td>' . $row['destinazione'] . '</td>
                    <td>' . $row['dataPartenza'] . '</td>
                    <td>' . $row['oraPartenza'] . '</td>
                    <td><a href="./scripts/deleteFlight.php?id='.$row['id'].'"><img class="alitalia-icon" src="./immagini/iconeAdmin/delete-user.svg"></img></a></td>
                </tr>';  
        }
        echo "</tbody>
            </table>";
    }
    else{            
        $res->free_result();
    }

}else{
    header('Location: ./permissionDenied.php');
}
?>