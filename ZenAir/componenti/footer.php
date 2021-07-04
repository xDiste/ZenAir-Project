
<footer class="page-footer font-small blue pt-4">

  
  <div class="container-fluid text-center text-md-left">

    
    <div class="row">

      <div class="col-md-6 mt-md-0 mt-3">

      
        <h2>ZenAirways</h2>
        <p>Telefono: 010 - 011110<br>Indirizzo: Via dodecaneso 12<br>Email per il supporto: compAerea12@gmail.com</p>

      </div>
     

      <hr class="clearfix w-100 d-md-none pb-3">

      <div class="col-md-3 mb-md-0 mb-3">

     
        <h5 class="text-uppercase">Pagine</h5>
        
        <ul class="list-unstyled">
          <li>
            <a href="<?php echo $GLOBALS['baseUrl'];?>/index.php">Home</a>
          </li>
          <?php 
          if(isset($_SESSION['email']) &&  $_SESSION['administrator'] != 0){ 
            echo'
            <li>
              <a href="'; echo $GLOBALS['baseUrl'].'/scripts/php/logout.php">Logout</a>
            </li>';
          }
          else{
            if(!isset($_SESSION['id'])){
            echo'
            <li>
              <a href="'; echo $GLOBALS['baseUrl'].'/reg.php">Registrati</a>
            </li>
            <li>
              <a href="'; echo $GLOBALS['baseUrl'].'/log-in.php">Login</a>
            </li>';
            }
            else{
              echo'
              <li>
                <a href="'; echo $GLOBALS['baseUrl'].'/scripts/php/logout.php">Logout</a>
              </li>
              <li>
                <a href="'; echo $GLOBALS['baseUrl'].'/show_profile.php">Profilo</a>
              </li>
              <li>
                <a href="'; echo $GLOBALS['baseUrl'].'/carrello.php">Carrello</a>
              </li>';
            } 
            echo'
            <li>
              <a href="'; echo $GLOBALS['baseUrl'].'/cercaBiglietti.php">Biglietti</a>
            </li>';
          } ?>
          
        </ul>

      </div>
      
      <div class="col-md-3 mb-md-0 mb-3">


        <h5 class="text-uppercase">Social</h5>

        <ul class="list-unstyledIcon list-unstyled">
          <li>
            <a href="#!"><img src="<?php echo $GLOBALS['baseUrl'];?>/immagini/footerIcon/facebook.png" alt="facebook"></a>
          </li>
          <li>
            <a href="#!"><img src="<?php echo $GLOBALS['baseUrl'];?>/immagini/footerIcon/google.png" alt="google"></a>
          </li>
          <li>
            <a href="#!"><img src="<?php echo $GLOBALS['baseUrl'];?>/immagini/footerIcon/instagram.png" alt="instagram"></a>
          </li>
          <li>
            <a href="#!"><img src="<?php echo $GLOBALS['baseUrl'];?>/immagini/footerIcon/twitter.png" alt="twitter"></a>
          </li>
        </ul>

      </div>


    </div>
   

  </div>
 

 
  <div class="footer-copyright text-center py-3">© 2020 Copyright: ZenAirways2020
  </div>


</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>








