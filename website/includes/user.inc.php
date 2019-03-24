<?php

class User extends Dbc {

  public function getUserNameExists($username) {
    $usernameprepared = $username;

    $stmt = $this->connect()->prepare("SELECT usernameUsers FROM users where usernameUsers=?");
    $stmt->execute([$username]);

    if ($stmt->rowCount()) {
      while ($row >= 0) {
        return true;
      }
    }
    else {
      return false;
    }
  }



  public function getMailExists($mail) {
    $mailprepared = $mail;

    $stmt = $this->connect()->prepare("SELECT emailUsers FROM users where emailUsers=?");
    $stmt->execute([$mail]);

    if ($stmt->rowCount()) {
      while ($row >= 0) {
        return true;
      }
    }
    else {
      return false;
    }
  }

  public function getActiveUsername($username){
    $usernameprepared = $username;

    $stmt = $this->connect()->prepare("SELECT * FROM users WHERE usernameUsers=?");
    $stmt->execute([$username]);
    $data = $stmt->fetch(PDO::FETCH_OBJ);
    if(is_object($data)){
      session_start();
      $_SESSION['active'] = $data->active;
      $_SESSION['code'] = $data->verificatie;
      $_SESSION['username'] = $data->usernameUsers;
      $_SESSION['id'] = $data->idUsers;

    }
  }

  public function insertNewUser($username, $mail, $firstName, $lastName, $pwd, $rankUser, $verificatieCode) {
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
  //  $hashedcode = password_hash($verificatieCode, PASSWORD_DEFAULT);
    $stmt = $this->connect()->prepare("INSERT INTO users (usernameUsers,emailUsers, firstNameUsers, lastNameUsers,  passwordUsers, rankUsers, verificatie) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$username, $mail, $firstName, $lastName, $hashedpwd, $rankUser, $verificatieCode]);
  }

  public function loginUser($usernameEmail,$password) {
    try {
      $stmt = $this->connect()->prepare("SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?");
      $stmt->execute([$usernameEmail,$usernameEmail]);
      $count=$stmt->rowCount();
      $data=$stmt->fetch(PDO::FETCH_OBJ);
      if (is_object($data)) {
        if(password_verify($password,$data->passwordUsers)) {
          session_start();
          $_SESSION['userid'] = $data->idUsers;
          $_SESSION['username'] = $data->usernameUsers;
          $_SESSION['rankUser'] = $data->rankUsers;
          $_SESSION['active'] = $data->active;
          header("Location: ../index.php?login=succes");
          exit();
        }
        else {
          header("Location: ../index.php?error=loginfailed");
          exit();
        }
      } else {
        header("Location: ../index.php?error=loginfailed");
        exit();
      }
    }

      catch(PDOException $e) {
      echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
  }

public function set_active($username){
  $idprepared = $username;
  $stmt = $this->connect()->prepare("UPDATE users SET active =1 WHERE usernameUsers =?");
  $stmt->execute([$username]);
}

  public function updateUsername($username, $id){
       $usernameprepared = $username;
       $idprepared = $id;
       $stmt = $this->connect()->prepare("UPDATE users SET usernameUsers =? WHERE idUsers =?");
       $stmt->execute([$username,$id]);
   }
   public function updateEmail($mail,$id){
       $mailprepared = $mail;
       $idprepared = $id;
       $stmt = $this->connect()->prepare("UPDATE users SET emailUsers =? WHERE idUsers=?");
       $stmt->execute([$mail,$id]);
   }

   public function updateFirstname($firstname,$id){
       $firstnameprepared = $firstname;
       $idprepared = $id;
       $stmt = $this->connect()->prepare("UPDATE users SET firstNameUsers =? WHERE idUsers=?");
       $stmt->execute([$firstname,$id]);
   }

   public function updateLastname($lastname,$id){
     $lastnameprepared = $lastname;
     $idprepared = $id;
     $stmt = $this->connect()->prepare("UPDATE users SET lastNameUsers =? WHERE idUsers=?");
     $stmt->execute([$lastname,$id]);
   }

   public function updatePassword($password,$id){
     $preparedpassword = $password;
     $preparedid = $id;
     $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
       $stmt = $this->connect()->prepare("UPDATE users SET passwordUsers =? WHERE idUsers=?");
       $stmt->execute([$hashedpwd,$id]);
   }
   public function updateRank($rank, $id){
     $preparedrank = $rank;
     $preparedid = $id;
     $stmt = $this->connect()->prepare("UPDATE users SET rankUsers =? WHERE idUsers=?");
     $stmt->execute([$rank,$id]);
   }

   public function DeleteUsers($id){
     $preparedid = $id;
     $stmt = $this->connect()->prepare("DELETE FROM users WHERE idUsers=?");
     $stmt->execute([$id]);
}
}
?>
