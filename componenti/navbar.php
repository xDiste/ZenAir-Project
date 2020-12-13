<?php
  echo '
    <nav class="navbar navbar-expand-lg navbar-dark">
      <img class="logo" src="./immagini/navbarIcon/LogoSito.jpg">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="./index.php">Home <span class="sr-only">(current)</span></a>
          </li>';
          
          if(isset($_SESSION['email']) &&  $_SESSION['email'] == "admin@admin.admin") {
            echo '<li class="nav-item">
            <a class="nav-link" href="./scripts/php/logout.php">Logout</a>
          </li>';
          }else {
            if(!isset($_SESSION['id'])) {
              echo '<li class="nav-item">
                <a class="nav-link" href="./reg.php">Registrati</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./log-in.php">Login</a>
              </li>';

            }else{
              echo '<li class="nav-item">
                <a class="nav-link" href="./scripts/php/logout.php">Logout</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./show_profile.php">Profilo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./carrello.php">Carrello</a>
              </li>';
            }
            echo'
            <li class="nav-item">
              <a class="nav-link" href="./cercaBiglietti.php">Biglietti</a>
            </li>
        </ul>';
        }
        echo'
      </div>
    </nav>';
?>  





































