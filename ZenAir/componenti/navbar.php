<?php
  echo '
    <nav class="navbar navbar-expand-lg navbar-dark">
      <img class="logo" src="'; echo $GLOBALS['baseUrl'].'/immagini/navbarIcon/LogoSito.jpg" alt="logo del sito">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/index.php">Home <span class="sr-only">(current)</span></a>
          </li>';
          
          if(isset($_SESSION['email']) &&  $_SESSION['administrator'] != 0) {
            echo '
            <li class="nav-item active">
            <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/administrator.php">Administrator <span class="sr-only">(current)</span></a>
          </li><li class="nav-item">
            <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/scripts/php/logout.php">Logout</a>
          </li>';
          }else {
            if(!isset($_SESSION['id'])) {
              echo '<li class="nav-item">
                <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/reg.php">Registrati</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/log-in.php">Login</a>
              </li>';

            }else{
              echo '<li class="nav-item">
                <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/scripts/php/logout.php">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/scripts/php/show_profile.php">Profilo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/carrello.php">Carrello</a>
              </li>';
            }
            echo'
            <li class="nav-item">
              <a class="nav-link" href="'; echo $GLOBALS['baseUrl'].'/cercaBiglietti.php">Biglietti</a>
            </li>
        </ul>';
        }
        echo'
      </div>
    </nav>';
?>  





































