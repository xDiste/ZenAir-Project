
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h2>Naviga anche qui</h2>
        <p>Here you can use rows and columns to organize your footer contentHere you can use rows and columns to organize your footer content Here you can use rows and columns to organize your footer contentHere you can use rows and columns to organize your footer content
        .</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Pagine</h5>
        
        <ul class="list-unstyled">
          <li>
            <a href="./index.php">Home</a>
          </li>
          <li>
            <a href="./cercaBiglietti.php">Biglietti</a>
          </li>
          <?php 
        if(!isset($_SESSION['id'])){
        ?>
            <li>
              <a href="./reg.php">Registrati</a>
            </li>
            <li>
              <a href="./log-in.php">Login</a>
            </li>
        <?php 
        } 
        else{ ?>
          <li>
              <a href="./carrello.php">Carrello</a>
          </li>
          <li>
            <a href="./scripts/php/logout.php">Logout</a>
          </li>
        <?php 
        }
        ?>

        </ul>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5 class="text-uppercase">Social</h5>

        <ul class="list-unstyledIcon list-unstyled">
          <li>
            <a href="#!"><img src="./immagini/footerIcon/facebook.png"></a>
          </li>
          <li>
            <a href="#!"><img src="./immagini/footerIcon/google.png"></a>
          </li>
          <li>
            <a href="#!"><img src="./immagini/footerIcon/instagram.png"></a>
          </li>
          <li>
            <a href="#!"><img src="./immagini/footerIcon/twitter.png"></a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright: Airplane2020
  </div>
  <!-- Copyright -->

</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>








