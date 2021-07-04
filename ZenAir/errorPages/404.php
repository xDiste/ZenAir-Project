<?php
    session_start();
    require_once('../globalVariables.php');
?>
<html lang="it">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo $GLOBALS['baseUrl'];?>/style/index.css">
        <title>Errore</title>
        <link rel="icon" href="<?php echo $GLOBALS['baseUrl'];?>/immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        
        <div class ="headerIndex"> 
        <?php
            include "../componenti/navbar.php";
        ?>   
            <h1 class="titolo"><b>Viaggia con noi</b></h1>
            <h3 class="sub-titolo">"Il sito giusto per le vacanze ideali"</h3>
        </div>   
        <div class="card text-white bg-secondary mb-3" style="width: 100%!important;border-radius:0!important; margin:0!important;">
            <div class="card-header">404 pagina non trovata</div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text">Il percorso selezionato non è disponibile torna sulla <a href="<?php echo $GLOBALS['baseUrl'];?>/index.php">home</a></p>
            </div>
        </div>
        <?php
            include "../componenti/footer.php";
        ?>
    </body>
</html>
