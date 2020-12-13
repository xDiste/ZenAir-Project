<?php
session_start();
if(!isset($_SESSION['email']) || (isset($_SESSION['email']) && $_SESSION['email'] == 'admin@admin.admin')) header('Location: ./permissionDenied.php');
require_once('./scripts/php/calcolaTotale.php');
?>

<!doctype html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index.css"></link>
        <title> Carrello </title>
        <link rel="icon" href="./immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <div class ="headerLog-in"> 
        <?php
            include "./componenti/navbar.php";
        ?>   
            <h1 class="titolo"><b>Carrello</b></h1>
        </div>  
        <div class="cart-container">
            <div class="cart">
                <?php
                if($res->num_rows > 0){
                    while($row = $res->fetch_assoc()) {
                        echo '
                        <div class="cart-card card mb-3"">
                            <div class="row no-gutters">
                                <div class="col-lg">
                                    <div class="card-body">
                                        <h5 class="cart-title card-title">' . $row['partenza'] . ' - ' . $row['destinazione'] . '</h5>
                                        <p align="right"><img class="cart-icon" src="./immagini/cart/plane.svg" align="left"/>#' . $row['id'] . '</p>
                                        <hr>
                                        <p align="right"><img class="cart-icon" src="./immagini/cart/calendar.svg" align="left"/>' . $row['dataPartenza'] . '</p>
                                        <hr>
                                        <p align="right"><img class="cart-icon" src="./immagini/cart/clock.svg" align="left"/>' . $row['oraPartenza'] . '</p>
                                        <hr>
                                        <p style="text-align:left; display:flex;">Prezzo: ' . $row['prezzo'] . '</p>
                                        <p style="text-align:left; display:flex;">Quantità: '. $row['quantita'] . ' </p>
                                        <a href="./scripts/php/removeCart.php?idUser='. $row['idUser'] .'&idVolo='. $row['idVolo'] .'"> <img class="cart-icon" src="./immagini/cart/cancel.svg"></img> Rimuovi dal carrello</a> 
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                }
                else{
                    echo "<h1>Il carrello è vuoto</h1>";
                }
                ?>
            </div>
            <div class="conto">
                <?php 
                    echo '<h2> Totale:  '.$totale . '$ </h2>'; 
                    echo '<h3> Biglietti totali:  '.$nBiglietti . '</h3>'; 
                ?>
                <br>
                <a href="./scripts/php/acquistaBiglietti.php" class="button btn btn-success">Termina e paga</a>
            </div>
        </div>
        <?php
            include "./componenti/footer.php";
        ?>
        </body>
</html>