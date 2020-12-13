<?php
session_start();
if(isset($_SESSION['id'])) header('Location: ./permissionDenied.php');
?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index.css">
        <script src="./scripts/js/registration.js"></script>

        <title>Registrazione</title>
        <link rel="shortcut icon" href="./immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <div class ="headerReg"> 
            <?php include "./componenti/navbar.php"; ?>
            <h1 class="titolo">Registrati</h1>
        </div> 

        
        <form class="reg" action="./scripts/php/registration.php" method="POST">
            <?php
            if (isset($_GET['error'])){
                $error = filter_var($_GET['error'], FILTER_SANITIZE_STRING);
                echo '<center style="color:red;">'. $error . '</center>';
            }
            ?>
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input name="firstname" type="text" class="form-control" id="firstname" required minlength="4">
            </div>
            <div class="form-group">
                <label for="lastname">Last name</label>
                <input name="lastname" type="text" class="form-control" id="lastname" required minlength="4">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" require>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input name="pass" type="password" class="form-control" id="pass" required minlength="8" onkeyup="checkPasswd();">
            </div>
            <div class="form-group">
                <label for="confirm" >Confirm Password</label>
                <input name="confirm"  type="password" class="form-control" id="confirm" onkeyup="checkPasswd();" required>
                <span id="message"></span>
            </div>
            <div class="form group">
                <input name="policy" type="checkbox" id="policy" value="Si" checked>
                <label for="policy"> Sì, ho letto la privacy policy e acconsento al trattamento dei dati</label>
                <br>
                <input name="newsletter" type="checkbox" id="newsletter" value="Si" checked>
                <label for="newsletter"> Voglio aderire al servizio Newsletter </label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            
        </form>
        <?php include "./componenti/footer.php";?>
    </body>
</html>

