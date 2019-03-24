<?php
if (isset($_POST['verify'])){

  require 'dbc.inc.php';
  require 'user.inc.php';

  $username = $_SESSION['username'];
  $active = $_SESSION['active'];
  $id = $_SESSION['id'];
  $verifycode = $_POST['verifyCode'];
  $verificatieCode = $_POST['code'];



  if($verifycode == $verificatieCode){
    $object = new User;
    $object->set_active($username);
    header("Location: ../index.php?verify=succes");
    exit();
  }
  else {
    header("Location: ../verify.php?error=invalidecode=".$username);
    exit();
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
