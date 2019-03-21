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
    $object->loginUser($username,$password);
  }
}
  else {
    header("Location: ../index.php");
    exit();
  }
?>
