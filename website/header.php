<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is the weather system of the Jordan Ahli Bank">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="styles/bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/master.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <title>OnzeBank</title>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #B6DCDC;">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ml-2">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>


        </ul>
        <?php
        if (isset($_SESSION['userid'])) {
          ?>
          <form class="form-inline" action="includes/logout.inc.php" method="post">
              <?php
              echo "Welcome"." ".$_SESSION["username"];
              if (isset($_SESSION['rankUser']) && ($_SESSION['rankUser'] == 2)){
              ?>
              <a class="btn btn-primary my-3 my-sm-0 ml-2" href="register_user.php" role="button">Register User</a>
            <?php } ?>
              <button type="submit" class="btn btn-danger my-3 my-sm-0 ml-2" name="logout-submit">Logout</button>
          </form>
          <?php
        } else {
          ?>
          <form class="form-inline my-2 my-lg-0" action="includes/login.inc.php" method="post">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control mr-sm-2" name="username" placeholder="Username/E-Mail" aria-label="username" aria-describedby="username">
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
              </div>
              <input type="password" class="form-control mr-sm-2" name="password" placeholder="Password" aria-label="password" aria-describedby="password">
            </div>
            <a class="btn btn-primary my-3 my-sm-0 ml-2" href="register_user.php" role="button">Register User</a>
            <button class="btn btn-dark my-2 my-sm-0" type="submit" name="login-submit">Login</button>
          </form>
          <?php
        }
        ?>
      </nav>
    </header>
