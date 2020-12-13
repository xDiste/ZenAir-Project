<?php
session_start();
require_once("./DBconnect.php");
$conn = connectDB(); 

$query = 'SELECT * FROM Users WHERE email <> "admin@admin.admin"';

if(!$stmt = $conn->prepare($query)){
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
}
if(!$stmt->execute()){
    echo "Qualcosa è andato storto! ".$stmt->errorno;
}
$res = $stmt->get_result();

$conn->close();

if(isset($_SESSION['email']) && ($_SESSION['email'] == "admin@admin.admin")){
    echo '<h1 class="cent-title">Lista utenti</h1>';
    if($res->num_rows > 0){
        echo '
            <table class="table table-striped table-dark w-auto">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Elimina</th>
                    </tr>
                </thead>
                <tbody>';
                while($row = $res->fetch_assoc()) {
                    echo'<tr class="tableTripValue">
                            <td>' . $row['firstName'] . '</td>
                            <td>' . $row['lastName'] . '</td>
                            <td>' . $row['email'] . '</td>
                            <td><a href="./scripts/deleteUser.php?id='.$row['id'].'"><img class="alitalia-icon" src="./immagini/iconeAdmin/delete-user.svg"></img></a></td>
                        </tr>';  
                }
                echo "</tbody>
                    </table>";
    }

}
else
{
    header('Location: ./permissionDenied.php');
}
?>

    </body> 
</html>