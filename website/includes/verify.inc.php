<?php

if (!isset($_post['verify'])){
  session_start();
  require 'dbc.inc.php';
  require 'user.inc.php';

  $username = $_SESSION['username'];
  $query = "SELECT * FROM users WHERE usernameUSERS = '$username'";
  $result = mysqli_query($db, $query) or die(mysqli_error($db));
  while($row = mysqli_fetch_row($result)){
    $verificatieCode = $row[7];
    $verifycode = $_POST['verifyCode'];
    if($verifycode == $verificatieCode){
      $query2="UPDATE users SET active = 1 WHERE usernameUSERS = '$username'";
      mysqli_query($db, $query2) or die(mysqli_error($db));
      header("Location: ../index.php?verify=succes");

    }
    else {
      header("Location: ../verify.php?error=invalidecode=".$username);
    }
  }


}else {
  ?>
  <br>
  <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
          <div class="alert alert-danger" role="alert">
              Please login before accessing this page.
          </div>
      </div>
      <div class="col-md-2">
      </div>
  </div>
  <?php
}
 ?>
