<?php
session_start();
?>
<!DOCTYPE html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index.css">
        <title>Profilo</title>
        <link rel="shortcut icon" href="./immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php 
            include("./componenti/navbar.php"); 
            if(isset($_SESSION['email']) && ($_SESSION['email'] == "admin@admin.admin")){
            }else{
                header('Location: ./permissionDenied.php');
            }
        ?>
            <h1 class="cent-title">Pannello di controllo</h1>
            <div class="control-panel container-par">
                <div class="img-brand control-panel-option">

                    <a style="color: inherit;" >
                        <img src="./immagini/adminIcon/user.svg" class="logo-brand" alt="icona show utenti">
                            <button onclick="ajaxcall('./scripts/php/show-users.php', 'result');" class="btn btn-success">Gestione utenti</button>
                    </a>

                    <a style="color: inherit;">
                        <img src="./immagini/adminIcon/writing.svg" class="logo-brand" alt="icona show utenti">
                            <button onclick="ajaxcall('./scripts/php/sendNews.php', 'result');"  class="btn btn-success">Newsletter</button>
                    </a>

                    <a style="color: inherit;">
                        <img src="./immagini/adminIcon/airplane.svg" class="logo-brand" alt="icona show voli">
                            <button onclick="ajaxcall('./scripts/php/show-flights.php', 'result');" class="btn btn-success">Gestione voli</button>
                    </a>
                </div>
            </div>

            <div id="result">

            </div>

            <?php
            include("./componenti/footer.php");
            ?>

            <script src="./scripts/js/ajax.js"></script>
    </body> 
</html>








