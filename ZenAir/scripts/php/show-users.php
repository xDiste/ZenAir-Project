<?php
session_start();
if(isset($_SESSION['administrator']) && $_SESSION['administrator']!= 0){
    require_once('../../globalVariables.php');
    require_once("./../../../DBconnect.php");
    $conn = connectDB(); 

    $res = $conn->query('SELECT * FROM Users WHERE administrator <> 1');

    $conn->close();

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
                            <td>' . htmlspecialchars($row['firstName']) . '</td>
                            <td>' . htmlspecialchars($row['lastName']) . '</td>
                            <td>' . htmlspecialchars($row['email']) . '</td>
                            <td><a href="./scripts/php/deleteUser.php?id='.htmlspecialchars($row['id']).'"><img class="alitalia-icon" src="'; echo $GLOBALS['baseUrl'].'/immagini/adminIcon/delete-user.svg"></img></a></td>
                        </tr>';  
                }
                echo "</tbody>
                    </table>";
    }

}
else {Header('Location: ../../componenti/accessoNegato.php'); exit();};

?>