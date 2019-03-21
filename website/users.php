<?php
require "header.php";


if (isset($_SESSION['rankUser']) && ($_SESSION['rankUser'] == 2)) {

require "includes/dbc.inc.php";
require "includes/user.inc.php";
  if (isset($_GET['delete'])){
      if ($_GET['delete'] == "success") {
        ?>
        <div class="alert alert-success" role="alert">
            You have succesfully deleted the user.
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            The users isn't deleted.
        </div>
        <?php
      }
  }


require_once("includes/table.inc.php");

$fetch = new inc();
$returnData = $fetch->getQuery();

?>
<table  class="table  table-sm table-hover table-bordered " align="center" >
    <thead>
    <tr>
        <th style="width: 5%" scope="col">Id</th>
        <th style="width: 12%" scope="col">username</th>
        <th style="width: 20%" scope="col"> </th>
        </tr>
    </thead>
    <tbody>

<?php

foreach ($returnData as $data) {
    ?>
    <tr>
        <td> <?php echo htmlspecialchars($data['idUsers']) ?> </td>
        <td> <?php echo htmlspecialchars($data['usernameUsers']) ?> </td>
        <td><?php echo " <a class = 'btn btn-dark' href='edit_user.php?idUsers=".$data['idUsers']."'>Edit user</a>"?> </td>
    </tr>

    <?php
}?>
</tbody>
    </table>

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
  <?php
}
