<?php
require_once("database.php");
require_once("control.php");

class Users{
  public $username;
  public $name;
  public $email;
  public $password;
  public $title;
  public $description;
  public $url;
  public $id;
  public $msg;
  public $user_id;
  public $profile_id;

  public function register($name, $username, $email, $pw, $pw_confirm){
    global $database;
    $password = $pw;
    $password_repeat = $pw_confirm;
    if($password == $password_repeat){
      $this->email = $email;
      $sql = "SELECT id FROM users WHERE email = '".$this->email."'";
      $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
      if($res = mysqli_fetch_array($query) > 0){
        header("Location: ../register.php?err=2");
      }else{
        $this->username = mysqli_real_escape_string($database->connection, $username);
        $this->name = mysqli_real_escape_string($database->connection, $name);
        $this->password = password_hash($pw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username,email,password,name) VALUES ('".$this->username."','".$this->email."','".$this->password."','".$this->name."')";
        if($query = mysqli_query($database->connection, $sql)){
          header("Location: ../login.php");
        }else{
          die(mysqli_error($database->connection));
        }
      }
    }else{
      header("Location: ../register.php?err=3");
    }
  }
  public function login($email, $password){
    global $database;
    $this->email = $email;
    $this->password = mysqli_real_escape_string($database->connection, $password);
    $sql = "SELECT * FROM users WHERE email = '".$this->email."'";
    $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
    if(mysqli_num_rows($query) > 0){
      $res = mysqli_fetch_array($query);
      $pw = $res['password'];
      if(password_verify($this->password, $pw)){
        session_start();
        $_SESSION['id'] = $res['id'];
        header("Location: ../home.php");
      }else{
        header("Location: ../login.php?err=1");
      }
    }else{
      header("Location: ../login.php?err=2");
    }
  }
  public function get_user_by_id($id){
    global $database;
    $sql = "SELECT * FROM users WHERE id = '".$id."'";
    $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
    if(mysqli_num_rows($query) > 0){
      return $res = mysqli_fetch_array($query);
    }
  }
  public function edit_profile($id){
    global $database;
    $photo_dir = "../profile_pictures/";
    $this->id = $id;
    $this->title = $_POST['title'];
    $this->description = $_POST['description'];
    $this->url = $_POST['url'];
    if($_FILES['photo']['name'] !== ""){
      $file_name = $_FILES['photo']['name'];
      $filetmpname = $_FILES['photo']['tmp_name'];
      move_uploaded_file($filetmpname, $photo_dir.$file_name);
      $sql = "UPDATE users SET title='".$this->title."', description='".$this->description."', url='".$this->url."', photo='".$file_name."' WHERE id='".$this->id."'";
      $database->connection->query($sql);
      return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }else{
      $sql = "UPDATE users SET title='".$this->title."', description='".$this->description."', url='".$this->url."' WHERE id='".$this->id."'";
      $database->connection->query($sql);
      return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }
  }
  public function is_following($user_id, $profile_id){
    global $database;
    $this->user_id = $user_id;
    $this->profile_id = $profile_id;
    $sql = "SELECT * FROM follows WHERE user_id = '".$this->user_id."' AND follow_id = '".$this->profile_id."'";
    $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
    if(mysqli_num_rows($query) > 0){
      return true;
    }else{
      return false;
    }
  }
  public function follow($user_id, $profile_id){
    global $database;
    $this->user_id = $user_id;
    $this->profile_id = $profile_id;
    $sql = "INSERT INTO follows(user_id,follow_id) VALUES ('".$this->user_id."','".$this->profile_id."')";
    if($query = mysqli_query($database->connection, $sql)){
      header("Location: ../profile/profile.php?user_id=".$this->user_id."&profile_id=".$this->profile_id);
    }else{
      header("Location: ../profile/profile.php?user_id=".$this->user_id."&profile_id=".$this->profile_id);
      die(mysqli_error($database->connection));
    }
  }
  public function unfollow($user_id, $profile_id){
    global $database;
    $this->user_id = $user_id;
    $this->profile_id = $profile_id;
    $sql = "DELETE FROM follows WHERE user_id = '".$this->user_id."' AND follow_id = '".$this->profile_id."'";
    if($query = mysqli_query($database->connection, $sql)){
      header("Location: ../profile/profile.php?user_id=".$this->user_id."&profile_id=".$this->profile_id);
    }else{
      header("Location: ../profile/profile.php?user_id=".$this->user_id."&profile_id=".$this->profile_id);
      die(mysqli_error($database->connection));
    }
  }
  public function followers_count($profile_id){
    global $database;
    $this->profile_id = $profile_id;
    $sql = "SELECT user_id FROM follows WHERE follow_id = '".$this->profile_id."'";
    $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
    return $query->num_rows;
  }
  public function following_count($profile_id){
    global $database;
    $this->profile_id = $profile_id;
    $sql = "SELECT follow_id FROM follows WHERE user_id = '".$this->profile_id."'";
    $query = mysqli_query($database->connection, $sql) or die(mysqli_error($database->connection));
    return $query->num_rows;
  }
}
$user = new Users();
 ?>
