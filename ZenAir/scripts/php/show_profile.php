<?php
session_start();
if(!isset($_SESSION['email']) || (isset($_SESSION['email']) && $_SESSION['administrator'] != 0)) header('Location: ../../errorPages/permissionDenied.php');
require_once("../../globalVariables.php");
?>
<!doctype html>
    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet"href="<?php echo $GLOBALS['baseUrl'];?>/style/index.css">
        <title>Profilo</title>
        <link rel="shortcut icon" href="./immagini/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo $GLOBALS['baseUrl'];?>/immagini/favicon.ico" type="image/x-icon">
    </head>
    <body>
        <?php 
        include("../../componenti/navbar.php"); 
        if(isset($_SESSION['id'])){
            if(  $_SESSION['administrator'] != 0) {
             header('Location: ../../errorPages/permissionDenied.php');
             exit();
            }
            else{
               
                if (isset($_GET['error'])){
                    $error = filter_var($_GET['error'], FILTER_SANITIZE_STRING);
                    echo '<center style="color:red;">'. $error . '</center>';
                }
        ?>
            <form class="form-style" action="<?php echo $GLOBALS['baseUrl'];?>/scripts/php/update_profile.php" method="POST" >
            
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input   name="firstname" type="text" class="form-control modify" id="firstname" value = "<?php echo htmlspecialchars($_SESSION['firstname']);  ?>">
                </div>
                <div class="form-group">
                    <label for="lastname">Last name</label>
                    <input  name="lastname" type="text" class="form-control modify" id="lastname" value ="<?php echo htmlspecialchars($_SESSION['lastname']);  ?>" >
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" class="form-control modify" id="email" aria-describedby="emailHelp" value = <?php echo htmlspecialchars($_SESSION['email']);  ?>>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input  name="pass" type="password" class="form-control modify" id="pass" aria-describedby="emailHelp" placeholder="inserisci una nuova password">
                </div>
                <div class="form group">
                    <label for="newsletter"> Voglio aderire al servizio Newsletter </label>
                    <input name="newsletter" type="checkbox" class="modify" id="newsletter" value="Si" checked>
                </div>
            
                <button  type="submit" class="btn btn-success modify">Modifica</button>
            </form>
        <?php
            }
        }else{
            header('Location: ../..//index.php');
            exit();
        }
        include("../../componenti/footer.php");
        ?>
    </body>
</html>




