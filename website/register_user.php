<?php
  require "header.php";

    ?>
    <main>
        <div class="container" style="padding-top:50px">
            <div class="row">
                <div class="col-sm">
                    <h1 style="text-align: center;">Register user</h1>
                    <div style="padding-top:50px;"></div>
                    <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Fill in all fields before submitting.
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
                        } elseif ($_GET['error'] == "passworderror") {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Passwords did not match.
                            </div>
                            <?php
                        } elseif ($_GET['error'] == "passwordshorterror") {
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
                        } elseif ($_GET['error'] == "firstnameerror") {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                You can only use letters in your first name.
                            </div>
                            <?php
                        } elseif ($_GET['error'] == "lastnameerror") {
                            ?>
                            <div class="alert alert-danger" role="alert">
                            You can only use letters in your surname.
                            </div>
                            <?php
                        } elseif ($_GET['error'] == "rankerror") {
                             ?>
                            <div class="alert-danger" role="alert">
                                Select role.
                            </div>
                            <?php
                        }
                    } elseif (isset($_GET['signup'])) {
                        if ($_GET['signup'] == "success") {
                            ?>
                            <div class="alert alert-success" role="alert">
                                You have succesfully registered a new user!
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                Failed to register user!!
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <form class="form-group" action="includes/register_user.inc.php" method="post">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control mr-sm-2" name="uid" placeholder="Username"
                                   aria-label="username" aria-describedby="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i
                                            class="fas fa-envelope fa-sm"></i></span>
                            </div>
                            <input type="text" class="form-control mr-sm-2" name="mail" placeholder="E-Mail"
                                   aria-label="mail" aria-describedby="mail">
                        </div>
                        <form class="form-group" action="includes/register_user.inc.php" method="post">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control mr-sm-2" name="first" placeholder="First name"
                                       aria-label="first name" aria-describedby="first name">
                            </div>
                            <form class="form-group" action="includes/register_user.inc.php" method="post">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control mr-sm-2" name="last" placeholder="Surname"
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
                                <option value="1">User</option>
                                <?php if (isset($_SESSION['rankUser']) && ($_SESSION['rankUser'] == 2)) {?>
                                <option value="2">Admin</option>
                              <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-dark" type="submit" name="signup-submit">Signup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
