<?php
if (isset($_POST['signup-submit'])) {

  require 'dbc.inc.php';
  require 'user.inc.php';

  $username = $_POST["uid"];
  $mail = $_POST["mail"];
  $firstName = $_POST['first'];
  $lastName = $_POST['last'];
  $pwd = $_POST["pwd"];
  $pwdRepeat = $_POST["pwd-repeat"];
  $rankUser= $_POST["rankUser"];
  $verificatieCode = rand(100000,999999);
  $filename = '../data/'.$mail.'.txt';
  $msg = '

  Thanks for signing up!
  Your account has been created.
  Currently your account is not activated yet.
  To activate your account please login to our website and use the following verification code:

  --------------------------------------------
  Verification code: '.$verificatieCode.'
  --------------------------------------------
  ';

  if (empty($username) || empty($mail) || empty($firstName) || empty($lastName) || empty($pwd) || empty($pwdRepeat) || empty($rankUser)) {
    header("Location: ../register_user.php?error=emptyfields&user=".$username."&email=".$mail);
    exit();
  }
  else if (!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../register_user.php?error=invalidmailuser");
    exit();
  }
  else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register_user.php?error=invalidmail&user=".$username);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../register_user.php?error=invaliduser&email=".$mail);
    exit();
  }/*
  else if(!preg_match("/^[a-zA-Z*$/",$firstName)){
   header("Location: ../register_user.php?error=firstnameerror".$firstName);
  }
  else if(!preg_match("/^[a-zA-Z*$/",$lastName)){
      header("Location: ../register_user.php?error=lastnameerror".$lastName);
  }*/
  else if ($pwd !== $pwdRepeat) {
    header("Location: ../register_user.php?error=passworderror&user=".$username."&email=".$mail);
    exit();
  }
  else if(strlen ($pwd <= '8')){
    header("Location: ../register_user.php?error=passwordshorterror&user=".$username."&email=".$mail);
    exit();
  }else if (strlen($pwd) < '8') {
    header("Location: ../register_user.php?idUsers=".$id."&error=passwordshorterror&user=".$username."&email=".$mail);
    exit();
  }else if (!preg_match("#[0-9]+#",$pwd)) {
    header("Location: ../register_user.php?idUsers=".$id."&error=passwordnumerror&user=".$username."&email=".$mail);
    exit();
  }else if (!preg_match("#[A-Z]+#",$pwd)) {
    header("Location: ../register_user.php?idUsers=".$id."&error=passwordcaperror&user=".$username."&email=".$mail);
    exit();
  }else if (!preg_match("#[a-z]+#",$pwd)) {
    header("Location: ../register_user.php?idUsers=".$id."&error=passwordlowerror&user=".$username."&email=".$mail);
    exit();
  }else if (empty($rankUser)){
      header("Location: ../register_user.php?error=rankerror=".$rankUser);
      exit();
  }else {
    $object = new User;
    if ($object->getUserNameExists($username)) {
      header("Location: ../register_user.php?error=usernameexists&email=".$mail);
      exit();
    }
    else if ($object->getMailExists($mail)) {
      header("Location: ../register_user.php?error=mailexists&user=".$username);
      exit();
    }
    else {
      $object->insertNewUser($username, $mail, $firstName, $lastName, $pwd, $rankUser, $verificatieCode);
      file_put_contents($filename, $msg);
      header("Location: ../register_user.php?signup=success");

    }
  }

} else {
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
