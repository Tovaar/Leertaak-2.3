<?php

if (isset($_POST['login-submit'])) {

  require 'dbc.inc.php';
  require 'user.inc.php';

  $username = $_POST["username"];
  $password = $_POST["password"];

  if (empty($username) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $object = new User;
    $object->getActiveUsername($username);
    if($_SESSION['active'] == 1){
    $object->loginUser($username,$password);
    header("Location: ../index.php");
    exit();
  }else {
    header("Location: ../verify.php");
  }
  }
}
  else {
    if ($_SESSION['active']== 1){
    header("Location: ../index.php");
    exit();
  }else {
    header("Location: ../verify.php");
  }
  }
?>
