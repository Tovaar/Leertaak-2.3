<?php
if (isset($post['verify'])){
  require 'dbc.inc.php';
  require 'user.inc.php';

  $username = $_SESSION['username'];
  $active = $_SESSION['active'];
  $id = $_SESSION['id'];
  $verifycode = $post['verifyCode'];
  $verificatieCode = $_SESSION['verificatieCode'];

echo $username;
  if($verifycode !== $verificatieCode){
    header("Location: ../verify.php?error=invalidecode=".$username);
  }
  else {
    $object = new User;
    $object->set_active($id);
    header("Location: ../index.php?verify=succes");

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
