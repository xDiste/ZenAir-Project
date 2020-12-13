<?php
session_start();
if(isset($_SESSION['email']) && $_SESSION['email'] == 'admin@admin.admin') header('Location: ./permissionDenied.php');
?>

<!doctype html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index.css">
        <title> Biglietti </title>
        <link rel="icon" href="./immagini/favicon.ico" type="image/x-icon"> 
    </head>
    <body>  
        <?php 
            include "./componenti/navbar.php";
        ?>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./immagini/biglietti/imgCarousel1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="./immagini/biglietti/imgCarousel2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img  src="./immagini/biglietti/imgCarousel3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <section class="search-sec sub-titolo">
            <div class="container">
                <div class="title">
                    <h2>Prenota il tuo volo ora!</h2>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input id="partenza" name="partenza" type="text" class="form-control form-elem" placeholder="Partenza">
                    </div>
                    <div class="form-group col-md-3">
                        <input id="destinazione" name="destinazione" type="text" class="form-control form-elem" placeholder="Destinazione">
                    </div>
                    <div class="form-group col-md-2">
                        <input id="quantita" min="1" name="quantita" type="number" class="form-control form-elem" placeholder="Viaggiatori">
                    </div>
                    <div class="form-group col-md-4">
                        <input id="trip-start" name="trip-start" type="date" class="form-control form-elem" placeholder="Data partenza">
                    </div>
                    <button onclick="ajaxcallTicket('./scripts/php/biglietti.php','ticketResult')" class="btn btn-success"><b>Cerca voli</b>
                        <img src="./immagini/biglietti/next.svg" alt="freccia a destra"/>
                    </button>
                </div>
            </div>                                                        
        </section>
        <div id="ticketResult">
        </div>
        <?php
            include "./componenti/cardsOffer.php";
            include "./componenti/footer.php";
        ?>
        <script> 
            let today = new Date().toISOString().substr(0, 10);
            document.querySelector("#trip-start").value = today;
        </script>
        <script src="./scripts/js/ajax.js"></script>
    </body>
    
</html>

