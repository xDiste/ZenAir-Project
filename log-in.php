<?php
session_start();
if(isset($_SESSION['id'])) header('Location: ./index.php');   
  
?>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="./style/index.css">
        <title>Login</title>
        <link rel="shortcut icon" href="./immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <div class ="headerLog-in"> 
            <?php include "./componenti/navbar.php"; ?>
            <h1 class="titolo">Login</h1>
        </div>
        <form class="reg" action="./scripts/php/login.php" method="POST" >
            <?php
                if (isset($_GET['error'])){
                    $error = filter_var($_GET['error'], FILTER_SANITIZE_STRING);
                    echo '<center style="color:red;">'. $error . '</center>';
                }
            ?>
            <div class="form-group">    
                <label for="email">Email address</label>
                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input name="pass" type="password" class="form-control" id="pass" required>
            </div>
            <button name="submit" type="submit" class="btn btn-success">Submit</button>
        </form>
        <?php include "./componenti/footer.php"; ?>
    </body>
</html>