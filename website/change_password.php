<?php
require "header.php";
if (isset($_SESSION['rankUser']) && isset($_SESSION['userid'])) {
    require "includes/dbc.inc.php";
    require "includes/user.inc.php";

    require "includes/table.inc.php";

$id = $_SESSION['userid'];

$fetch = new inc();
$returndata = $fetch->getUser($id);



    ?>
<main>
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-sm">
                <h1 style="text-align: center;">Change password</h1>
                <div style="padding-top:50px;"></div>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "passworderror") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Passwords did not match.
                        </div>
                        <?php
                    }elseif ($_GET['error'] == "emptyfields") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Please fill in all the fields.
                        </div>
                        <?php
                    }elseif ($_GET['error'] == "passwordshorterror") {
                       ?>
                       <div class="alert alert-danger" role="alert">
                           Passwords must contain of atleast 8 characters.
                       </div>
                       <?php
                    }elseif ($_GET['error'] == "passwordcaperror") {
                       ?>
                       <div class="alert alert-danger" role="alert">
                           Passwords must contain of atleast 1 captial letter.
                       </div>
                       <?php
                    }elseif ($_GET['error'] == "passwordlowerror") {
                       ?>
                       <div class="alert alert-danger" role="alert">
                           Passwords must contain of atleast 1 lowercase letter.
                       </div>
                       <?php
                    }elseif ($_GET['error'] == "passwordnumerror") {
                       ?>
                       <div class="alert alert-danger" role="alert">
                           Passwords must contain of atleast 1 number.
                       </div>
                       <?php
                }
              }elseif (isset($_GET['change'])) {
                    if ($_GET['change'] == "success") {
                        ?>
                        <div class="alert alert-success" role="alert">
                            Your password was sucessfully changed!
                        </div>
                      <?php }
                      else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Failed to change password!
                        </div>
                        <?php
                    }
                }

        ?>
        <form class="form-group" action="includes/change_password.inc.php" method="post">
          <div class="input-group mb-2">
              <div class="input-group-prepend">
              </div>
              <input type="hidden" class="form-control mr-sm-2" name="id"value="<?php echo $id ?>"
                      aria-label="id" aria-describedby="id">
          </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control mr-sm-2" name="pwd" placeholder="New password"
                               aria-label="password" aria-describedby="pwd">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control mr-sm-2" name="pwd-repeat"
                               placeholder="Repeat new password" aria-label="password-repeat"
                               aria-describedby="pwd-repeat">
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-dark" type="submit" name="change-submit">Change password</button>
                    </div>
                </form>
        </div>
        </div>
        </div>
        </main><?php

}
else {
  ?>
  <br>
  <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-8">
          <div class="alert alert-danger" role="alert">
              You cannot acces the page like this.
          </div>
      </div>
      <div class="col-md-2">
      </div>
  </div>
  <?php
 }
 ?>
