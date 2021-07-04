<?php
    session_start();
    require_once('./globalVariables.php');
?>
<!doctype html>
<html lang="it">
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo $GLOBALS['baseUrl'];?>/style/index.css"/>
        <title>Home</title>
        <link rel="shortcut icon" href="<?php echo $GLOBALS['baseUrl'];?>/immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $GLOBALS['baseUrl'];?>/immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        
        <div class ="headerIndex"> 
        <?php
            include "./componenti/navbar.php";
            
        ?>   
            <h1 class="titolo"><b>Viaggia con noi</b></h1>
            <h3 class="sub-titolo">"Il sito giusto per le vacanze ideali"</h3>
        </div>    
        

        <div class="col-container">
            <div class="col col1">
                <h2 class="title-desc"><b> Prenota il tuo biglietto aereo con ZenAirways </b></h2>
                <p class="de"> Prenota il tuo biglietto aereo al miglior prezzo con il comparatore di voli ZenAirways. La nostra agenzia di viaggi offre voli economici in tutto il mondo su diverse centinaia di compagnie aeree.
                Inoltre offriamo un servizio di  "Flights to nowhere": è la risposta che alcune linee aeree vorrebbero dare alla perdurante crisi. Di che si tratta? Sarebbero dei voli (o meglio sorvoli) turistici senza alcuna meta, completi di snack e vista panoramica dal finestrino a prezzi popolari.

Un aereo fermo è un peso insostenibile a lungo termine per qualsiasi compagnia. I vantaggi in questo caso sono il poter muovere la flotta anche se per voli a breve raggio, generare delle entrate e - limitandosi al territorio nazionale con decollo e arrivo nello stesso scalo - evitare le complicazioni burocratiche legate agli spostamenti internazionali.</p>

            </div>

            <div class="col">
                <img class="pic" src="<?php echo $GLOBALS['baseUrl'];?>/immagini/indexImage/aereo-voli.jpg" alt="immagine di sfondo di un aereo della compagnia">
            </div>
        </div>

        <hr>

        <div class="container-par">
            <h1 class="title-par"><b>Sponsor dell'Azienda</b></h1>
            <p class="text-par">
                Ringraziamo questi sponsor per non farci causa anche dopo aver utilizzato i loro loghi senza permesso:
            </p>
            <div class="img-brand">
                <img class="logo-brand" src="<?php echo $GLOBALS['baseUrl'];?>/immagini/iconIndex/uber.png" alt="logo uber">
                <img class="logo-brand"  src="<?php echo $GLOBALS['baseUrl'];?>/immagini/iconIndex/android.svg" alt="logo android">
                <img class="logo-brand"  src="<?php echo $GLOBALS['baseUrl'];?>/immagini/iconIndex/samsung.svg" alt="logo samsung">
                <img class="logo-brand"  src="<?php echo $GLOBALS['baseUrl'];?>/immagini/iconIndex/sony.png" alt="logo sony">
            </div>
        </div>
        <hr>

        <div class="col-container">
            <div class="col col1">
                <img class="pic" src="<?php echo $GLOBALS['baseUrl'];?>/immagini/indexImage/volo1col.jpg" alt="immagine aereo">
            </div>
            <div class="col ">
                <h2 class="title-desc"><b>Pianifica il tuo viaggio perfetto</b></h2>
                    <p class="de">
                        È il tuo mondo e noi ti aiuteremo ad esplorarlo. Trova i prezzi migliori tra milioni di offerte voli per organizzare il tuo viaggio perfetto.
                        Gestisci facilmente l'acquisto del tuo viaggio, così puoi rilassarti anche prima della partenza. Il nostro aereo 747 adotta una configurazione a doppio ponte per parte della sua lunghezza. È disponibile in versione passeggeri e da trasporto merci, più altre personalizzate. La Boeing progettò il ponte superiore a forma di "gobba" per utilizzarlo come salottino per i passeggeri di prima classe o, come accade solitamente in tempi recenti, per dare spazio a posti supplementari e per consentire all'aereo una facile trasformazione da aereo passeggeri ad aereo cargo, mediante la rimozione dei posti a sedere e l'installazione di un portellone di carico nel muso.
                    </p>
            </div>
            
        </div>
        
        <?php
            include "./componenti/footer.php";
        ?>
    </body>
</html>