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
    $username = $_POST["username"];
    $mail = $_POST["mail"];
    $firstName = $_POST['first'];
    $lastName = $_POST['last'];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwd-repeat"];
    $rankUser= $_POST["rankUser"];

    

    if(empty($username) && (empty($mail)) && (empty($firstName)) && (empty($lastName)) && (empty($pwd)) && (empty($pwdRepeat)) && (empty($rankUser))){
      header("Location: ../edit_user.php?idUsers=".$id."&error=emptyfields&user=".$username);
      exit();
    }
    elseif (!empty($mail) && !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../edit_user.php?idUsers=".$id."&error=invalidmail&user=".$username);
        exit();
    }
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../edit_user.php?idUsers=".$id."&error=invaliduser&email=".$mail);
        exit();
    }
    else if ($pwd !== $pwdRepeat) {
        header("Location: ../edit_user.php?idUsers=".$id."&error=passworderror&user=".$username."&email=".$mail);
        exit();
    }else if (!empty($pwd) && (strlen($pwd) < '8')) {
      header("Location: ../edit_user.php?idUsers=".$id."&error=passwordshorterror&user=".$username."&email=".$mail);
      exit();
    }else if (!empty($pwd) && (!preg_match("#[0-9]+#",$pwd))) {
      header("Location: ../edit_user.php?idUsers=".$id."&error=passwordnumerror&user=".$username."&email=".$mail);
      exit();
    }else if (!empty($pwd) && (!preg_match("#[A-Z]+#",$pwd))) {
      header("Location: ../edit_user.php?idUsers=".$id."&error=passwordcaperror&user=".$username."&email=".$mail);
      exit();
    }else if (!empty($pwd) && (!preg_match("#[a-z]+#",$pwd))) {
      header("Location: ../edit_user.php?idUsers=".$id."&error=passwordlowerror&user=".$username."&email=".$mail);
      exit();
    }
    else {
        $object = new User;
        if ($object->getUserNameExists($username)) {
            header("Location: ../edit_user.php?idUsers=".$id."&error=usernameexists&email=".$mail);
            exit();
        }
        else if ($object->getMailExists($mail)) {
            header("Location: ../edit_user.php?idUsers=".$id."&error=mailexists&user=".$username);
            exit();
        }
        else if (!empty($username)) {
            $object->updateUsername($username, $id);
            header("Location: ../edit_user.php?idUsers=".$id."&change=success");
        }
        else if (!empty($mail)) {
            $object->updateEmail($mail, $id);
            header("Location: ../edit_user.php?idUsers=".$id."&change=success");
        }
        else if (!empty($firstName)) {
            $object->updateFirstname($firstName, $id);
            header("Location: ../edit_user.php?idUsers=".$id."&change=success");
        }
        else if (!empty($lastName)) {
            $object->updateLastname($lastName, $id);
            header("Location: ../edit_user.php?idUsers=".$id."&change=success");
        }
        else if (!empty($pwd)) {
            $object->updatePassword($pwd, $id);
            header("Location: ../edit_user.php?idUsers=".$id."&change=success");
        }
        else if (!empty($rankUser)) {
            $object->updateRank($rankUser, $id);
            header("Location: ../edit_user.php?idUsers=".$id."&change=success");
        }
    }
}


elseif (isset($_POST['delete-submit'])){

  require 'dbc.inc.php';
  require 'user.inc.php';
  $id = $_POST['id'];
  if (!empty($id)) {
    $object = new User;
    $object->DeleteUsers($id);
    header("Location: ../users.php?delete=success");

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
