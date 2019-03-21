<?php
/**
 * Created by PhpStorm.
 * User: Sander
 * Date: 29-1-2019
 * Time: 19:48
 */
require "header.php";

if (isset($_SESSION['rankUser']) && ($_SESSION['rankUser'] == 2)) {
    require "includes/dbc.inc.php";
    require "includes/user.inc.php";

    require "includes/table.inc.php";

$id = $_GET['idUsers'];

$fetch = new inc();
$returndata = $fetch->getUser($id);



    ?>
<main>
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-sm">
                <h1 style="text-align: center;">Edit user</h1>
                <div style="padding-top:50px;"></div>
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == "emptyfields") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Fill in any fields before submitting.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "invalidmailuser") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid Username & E-mail address.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "invalidmail") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid E-mail address.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "invaliduser") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Invalid Username.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "usernameexists") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Username already in use.
                        </div>
                        <?php
                    } elseif ($_GET['error'] == "mailexists") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            E-mailades already in use.
                        </div>
                        <?php
                     }elseif ($_GET['error'] == "passworderror") {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Passwords did not match.
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
                    }elseif ($_GET['error'] == "rankerror") {
                        ?>
                        <div class="alert-danger" role="alert">
                            Select role.
                        </div>
                        <?php
                    }
                } elseif (isset($_GET['change'])) {
                    if ($_GET['change'] == "success") {
                        ?>
                        <div class="alert alert-success" role="alert">
                            The user was sucessfully editted!
                        </div>
                        <?php
                    }elseif ($_GET['passwordchange'] == "success") {
                        ?>
                        <div class="alert alert-success" role="alert">
                            The user was sucessfully editted!
                        </div>
                      <?php }else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Failed to edit user!
                        </div>
                        <?php
                    }
                }
                ?>
                <?php foreach ($returndata as $data) {

        ?>
        <form class="form-group" action="includes/edit_user.inc.php" method="post">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-passport"></i></span>
                </div>
                <input type="text"  class="form-control mr-sm-2" name="id" placeholder="<?php echo $data['idUsers'] ?> "readonly="readonly" value="<?php echo $data['idUsers'] ?>"
                       aria-label="id" aria-describedby="id">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control mr-sm-2" name="username" placeholder="<?php echo $data ['usernameUsers']?>"
                       aria-label="username" aria-describedby="username">
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-envelope fa-sm"></i></span>
                </div>
                <input type="text" class="form-control mr-sm-2" name="mail" placeholder="<?php echo $data['emailUsers'] ?>"
                       aria-label="mail" aria-describedby="mail">
            </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control mr-sm-2" name="first" placeholder="<?php echo $data['firstNameUsers'] ?>"
                           aria-label="first name" aria-describedby="first name">
                </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control mr-sm-2" name="last" placeholder="<?php echo $data['lastNameUsers'] ?>"
                               aria-label="last name" aria-describedby="last name">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control mr-sm-2" name="pwd" placeholder="Password"
                               aria-label="password" aria-describedby="pwd">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                        </div>
                        <input type="password" class="form-control mr-sm-2" name="pwd-repeat"
                               placeholder="Repeat password" aria-label="password-repeat"
                               aria-describedby="pwd-repeat">
                    </div>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                        class="fas fa-certificate fa-sm"></i></span>
                        </div>

                        <select name="rankUser" class="form-control mr-sm-2" aria-label="rankUser">
                            <option value="<?php if($data['rankUsers']==2){echo "2";} else{echo "1";} ?>"><?php if($data['rankUsers'] =='2'){ echo "Admin";} else{echo "User";}  ?>
                            <option value="1">User</option>
                            <option value="2">Admin</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="btn btn-dark" type="submit" name="change-submit">Edit user</button>
                        <button class="btn btn-danger" type="submit" name="delete-submit">Delete user</button>
                    </div>
                </form>
        </div>
        </div>
        </div>
        </main><?php
    }
}else{
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
