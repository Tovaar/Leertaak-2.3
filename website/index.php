<?php
  require "header.php";

?>
    <main>
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Fill in any fields before submitting.
                    </div>
                  <?php
                }elseif ($_GET['error'] == "loginfailed") {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Invalid combination of username/e-mail and password.
                    </div>
                  <?php
                }
              }?>
          </div>

        </div>
      </div>
      <br>
      <?php

      if (isset($_SESSION['rankUser']) && ($_SESSION['rankUser'] == 2)){
        echo "Welcome"." ".$_SESSION["username"];
        $test = random(1,6);
        echo $test;
      }?>
      <br>
    </main>
