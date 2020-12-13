<?php
    session_start();;

?>
<!doctype html>
<html lang="it">
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index.css">
        <title>Home</title>
        <link rel="shortcut icon" href="./immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./immagini/favicon.ico" type="image/x-icon">
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
                <h2 class="title-desc"><b>Il nostro personale altamente qualificato</b></h2>
                <p class="de"> mollis, euismod orci eu, tempor justo. Vivamus vitae placerat  quam. Duis elementum en quam. Duis elementum en quam. Duis elementum en quam. Duis elementum enquam. Duis elementum enim eu fermentum aliquam. Cras commodo nulla ut lacus convallis, ut sagittis magna faucibus. Proin ut massa nec sem malesuada sodales. Sed eu suscipit libero, eu convallis leo. Vivamus sollicitudin mauris ac orci condimentum, eu elementum purus pellentesque. Mauris ac tellus eleifend, laoreet quam non, imperdiet nunc.</p>
            </div>

            <div class="col">
                <img class="pic" src="./immagini/indexImage/aereo-voli.jpg" alt="immagine di sfondo di un aereo della compagnia">
            </div>
        </div>

        <hr>

        <div class="container-par">
            <h1 class="title-par"><b>Sponsor dell'Azienda</b></h1>
            <p class="text-par">
                mollis, euismod orci eu, tempor justo. Vivam mollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivamvmollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivam
                mollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivammollis, euismod orci eu, tempor justo. Vivam
            </p>
            <div class="img-brand">
                <img class="logo-brand" src="./immagini/iconIndex/uber.png" alt="logo uber">
                <img class="logo-brand"  src="./immagini/iconIndex/android.svg" alt="logo android">
                <img class="logo-brand"  src="./immagini/iconIndex/samsung.svg" alt="logo samsung">
                <img class="logo-brand"  src="./immagini/iconIndex/sony.png" alt="logo sony">
            </div>
        </div>
        <hr>

        <div class="col-container">
            <div class="col col1">
                <img class="pic" src="./immagini/indexImage/volo1col.jpg" alt="immagine aereo">
            </div>
            <div class="col ">
                <h2 class="title-desc"><b>Il nostro personale altamente qualificato</b></h2>
                    <p class="de">
                        mollis, euismod orci eu, tempor justo. Vivamus vitae placerat  quam. Duis elementum en quam. Duis elementum en quam. Duis elementum en quam. Duis elementum enquam. Duis elementum enim eu fermentum aliquam. Cras commodo nulla ut lacus convallis, ut sagittis magna faucibus. Proin ut massa nec sem malesuada sodales. Sed eu suscipit libero, eu convallis leo. Vivamus sollicitudin mauris ac orci condimentum, eu elementum purus pellentesque. Mauris ac tellus eleifend, laoreet quam non, imperdiet nunc.
                    </p>
            </div>

        </div>

        <?php
            include "./componenti/footer.php";
        ?>

    </body>
</html>