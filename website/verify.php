<?php
  require "header.php";
 if (isset($_SESSION['username'])){
?><main>
    <div class="container" style="padding-top:50px">
        <div class="row">
            <div class="col-sm">
                <h1 style="text-align: center;">Verify account</h1>
                <div style="padding-top:50px;"></div>
                <h4 style="text-align: center;">Please enter your verification code. The verification code was sent to ....</h5>
<?php echo $_SESSION['code']; echo $_SESSION['username']; ?>
  <form class="form-group" action="includes/verify.inc.php" method="post">
      <div class="input-group mb-2">
          <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1"><i class="fas fa-certificate"></i></span>
          </div>
          <input type="text" class="form-control mr-sm-2" name="verifyCode" placeholder="verification code"
                 aria-label="verifiCode" aria-describedby="verifiCode">
</div>
               <div class="col-md-12 text-center">
                     <button class="btn btn-dark" type="submit" name="verify">Verify</button>
               </div>
               <input type="text" class="form-control mr-sm-2" name="id" placeholder="<?php $_SESSION['username'];?>" hidden
                      aria-label="id" aria-describedby="id">
                <input type="text" class="form-control mr-sm-2" name="code" placeholder="<?php $_SESSION['code'];?>" hidden
                      aria-label="id" aria-describedby="id">

           </form>
           </div>
                 </div>
                 </div>
                 </main>
<?php
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

<?php } ?>
