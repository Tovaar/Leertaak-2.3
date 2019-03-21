<?php
/**
 * Created by PhpStorm.
 * User: Sander
 * Date: 4-2-2019
 * Time: 13:24
 */
if (isset($_POST['change-submit'])){

    require 'dbc.inc.php';
    require 'user.inc.php';

    $id = $_POST['id'];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwd-repeat"];


    if (empty($pwd) && empty($pwdRepeat)) {
      header("Location: ../change_password.php?idUser=".$id."&error=emptyfields");
      exit();
    }
    elseif ($pwd !== $pwdRepeat) {
        header("Location: ../change_password.php?idUser=".$_GET['idUser']."&error=passworderror");
        exit();
    }else if (!empty($pwd) && (strlen($pwd) < '8')) {
      header("Location: ../change_password.php?idUsers=".$id."&error=passwordshorterror&user=".$username."&email=".$mail);
      exit();
    }else if (!empty($pwd) && (!preg_match("#[0-9]+#",$pwd))) {
      header("Location: ../change_password.php?idUsers=".$id."&error=passwordnumerror&user=".$username."&email=".$mail);
      exit();
    }else if (!empty($pwd) && (!preg_match("#[A-Z]+#",$pwd))) {
      header("Location: ../change_password.php?idUsers=".$id."&error=passwordcaperror&user=".$username."&email=".$mail);
      exit();
    }else if (!empty($pwd) && (!preg_match("#[a-z]+#",$pwd))) {
      header("Location: ../change_password.php?idUsers=".$id."&error=passwordlowerror&user=".$username."&email=".$mail);
      exit();
    }
    else {
        $object = new User;
        if (!empty($pwd)) {
            $object->updatePassword($pwd, $id);
            header("Location: ../change_password.php?idUser=".$id."&change=success");
        }
    }

}

else {
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
