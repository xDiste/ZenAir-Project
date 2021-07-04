<?php
session_start();
require_once('./globalVariables.php');
require_once('./scripts/php/utils.php');
?>
<html>
    <head lang="it">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo $GLOBALS['baseUrl'];?>/style/index.css">
        <title>Area amministratore</title>
        <link rel="shortcut icon" href="./immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $GLOBALS['baseUrl'];?>/immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script> 
        <div class="wrapper">
            <?php 
                if(!isset($_SESSION['administrator']) || $_SESSION['administrator'] == 0){
                    header('Location: ./errorPages/permissionDenied.php');
                    exit();
                }
                else{
                include("./componenti/navbar.php"); 

            ?>
               <div class="graph-container">   
                    <h2 class="graph-title">Utenza</h2>
                    <canvas id="myChart" style="margin: -20px"></canvas>
               </div>

                <h1 class="cent-title">Pannello di controllo</h1>
                <?php
                    if (isset($_GET['state'])){
                        $state = filter_var($_GET['state'], FILTER_SANITIZE_STRING);
                        echo '<h2 class="cent-title">'. $state . '</h2>';
                    }
                ?>
                <div class="control-panel container-par">
                    <div class="img-brand control-panel-option">
                        <a style="color: inherit;" >
                            <img src="<?php echo $GLOBALS['baseUrl'];?>/immagini/adminIcon/user.svg" class="logo-brand" alt="icona show utenti">
                                <button onclick="ajaxcall('./scripts/php/show-users.php', 'result');" class="btn btn-success">Gestione utenti</button>
                        </a>

                        <a style="color: inherit;">
                            <img src="<?php echo $GLOBALS['baseUrl'];?>/immagini/adminIcon/writing.svg" class="logo-brand" alt="icona show utenti">
                                <button onclick="ajaxcall('./scripts/php/sendNews.php', 'result');"  class="btn btn-success">Newsletter</button>
                        </a>

                        <a style="color: inherit;">
                            <img src="<?php echo $GLOBALS['baseUrl'];?>/immagini/adminIcon/airplane.svg" class="logo-brand" alt="icona show voli">
                                <button onclick="ajaxcall('./scripts/php/show-flights.php', 'result');" class="btn btn-success">Gestione voli</button>
                        </a>
                    </div>
                </div>

            <div id="result"></div>
        </div>

            <footer class="page-footer font-small blue pt-0">
                <div class="footer-copyright text-center py-3">
                    © 2020 Copyright: ZenAirways
                </div>
            </footer>
            
            <script src="./scripts/js/ajax.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <?php
            }
            ?>
    </body> 
</html>

<script type="text/javascript">
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Gennaio/Febbraio', 'Marzo/Aprile', 'Maggio/Giugno', 'Luglio/Agosto', 'Settembre/Ottobre', 'Novembre/Dicembre'],
        datasets: [{
            label: 'Numero di utenti',
            data: <?php echo json_encode(extractData()); ?>,
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 206, 86)',
                'rgb(75, 192, 192)',
                'rgb(153, 102, 255)',
                'rgb(255, 159, 64)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        legend: {
            position: 'left'
        }
    }
});
</script>